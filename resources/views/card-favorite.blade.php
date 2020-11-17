@foreach($items as $item)
    <div class="row">
        <form action="{{route('repo.destroy',$item['id'])}}" method="post" class="col-md-6 mx-auto">
            @csrf
            {{ method_field('delete') }}
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title"><b>Name:</b> {{$item['name']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><b>html_url:</b> {{$item['html_url']}}</h6>
                        <p class="card-text"><b>description:</b> {{$item['description']}}</p>
                        <p class="card-text"><b>owner.login:</b> {{$item['owner_login']}}</p>
                        <p class="card-text"><b>stargazers_count:</b> {{$item['stargazers_count']}}</p>
                        <button type="submit" class="btn btn-danger delete-favorite">Delete from favorite</button>
                    </div>
                </div>
        </form>
    </div>
@endforeach

<div class="row justify-content-center">
    {!! $items->render() !!}
</div>

@if($items->isEmpty())
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center text-danger">Your list of favorites repo is empty</h5>
            </div>
        </div>
    </div>
@endif
