@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Laptop List</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="laptop-add" class="btn btn-primary">Add data</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div> 
        @endif
        </div> 

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laptops as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->laptop_code }}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{$category->name}}
                            @endforeach
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="laptop-edit/{{$item->slug}}">edit</a>
                            <a href="#">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection