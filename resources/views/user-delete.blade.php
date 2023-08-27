@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
    <h2>Yakin ingin menghapus user {{$user->username}}? </h2>
    <div class="mt-5">
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-3">Sure</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>
@endsection