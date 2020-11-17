@extends('layouts.main')
@section('content')
    <div class="row">
        <form class="col-md-4 mx-auto">
            <div class="form-group">
                <label>Search query</label>
                <input class="search form-control" type="text" placeholder="write query in this input">
            </div>

            <div class="form-group">
                <div class="not-found">Error</div>
                <a type="button" class="btn btn-light find-repo">Find repo</a>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto repo-container"></div>
    </div>

    <div class="row">
        <a href="#" class="btn btn-primary show-more-repo mx-auto">Show more</a>
    </div>

    <script src="{{asset('js/repo.js')}}"></script>
@endsection
