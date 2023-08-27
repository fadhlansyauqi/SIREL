@extends('layouts.mainlayout')

@section('title', 'Delete Laptop')

@section('content')
    <h2>Yakin ingin menghapus Laptop {{$laptop->title}}? </h2>
    <div class="mt-5">
        <a href="/laptop-destroy/{{$laptop->slug}}" class="btn btn-danger me-3">Sure</a>
        <a href="/laptops" class="btn btn-primary">Cancel</a>
    </div>
@endsection