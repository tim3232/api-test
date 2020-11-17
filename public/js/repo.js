$(function() {

    var from = 1;  //page from
    var query = false;

    $(".find-repo").on("click",function () {
        var searchString = $('.search').val();
        var isTrueSet = Boolean(searchString);

        $('.repo-container').html(''); // remove old div-s when we can find new query
        from = 1;

        if(isTrueSet){
            $('.search').removeClass('error');
            getRepoByQuery(searchString,from);
        }
        else {
            $('.search').addClass('error').attr('placeholder', 'input can"t be empty');
            $('.show-more-repo').hide();  //if we delete all from input and click find repo we need hide button more
        }
    });

    function getRepoByQuery(searchString,from) {

        query = searchString;
console.log(query);
        $.ajax({
            url: "api/v1/show-repo",
            type:"post",
            data:{ 'search_query' : searchString, 'from': from},
            success:function(response){
                if(response != ''){
                    $('.repo-container').append($.parseHTML(response)); //parse html to container div
                    $('.show-more-repo').show();  //show button more
                }
                else {
                    $('.not-found').fadeIn().fadeOut(3500); //if not found repos
                    $('.show-more-repo').hide();  //hide show-more when we get repos but then change query and repos not defined
                }

            },
        });
    }


    $(document).on('click', '.show-more-repo', function(){
        from++;
        getRepoByQuery(query,from);
    });


    $(document).on('submit','form',function(e) {
        e.preventDefault();
        var th = $(this);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "repo",
            type:"post",
            data:{ 'form_data' : th.serialize()},
            success:function(response){
                th.find('.add-favorite').removeClass('btn-success').addClass('btn-danger').prop("disabled", true);
            },
        });
    });


});