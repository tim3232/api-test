@foreach($items as $item)
    <form method="post">
        <div class="card">
            <div class="card-body">
                <input type="hidden" value="{{$item['name']}}" name="name">
                <input type="hidden" value="{{$item['html_url']}}" name="html_url">
                <input type="hidden" value="{{$item['description']}}" name="description">
                <input type="hidden" value="{{$item['owner']['login']}}" name="owner_login">
                <input type="hidden" value="{{$item['stargazers_count']}}" name="stargazers_count">

                <h5 class="card-title"><b>Name:</b> {{$item['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted"><b>html_url:</b> {{$item['html_url']}}</h6>
                <p class="card-text"><b>description:</b> {{$item['description']}}</p>
                <p class="card-text"><b>owner.login:</b> {{$item['owner']['login']}}</p>
                <p class="card-text"><b>stargazers_count:</b> {{$item['stargazers_count']}}</p>
                    <button type="submit" class="btn btn-success add-favorite">Add to favorite</button>
            </div>
        </div>
    </form>
@endforeach
