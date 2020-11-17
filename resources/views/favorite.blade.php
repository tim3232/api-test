@extends('layouts.main')
@section('content')
     @include('card-favorite',['items' => $items])
@endsection
