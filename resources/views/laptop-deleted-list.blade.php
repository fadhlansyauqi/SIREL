@extends('layouts.mainlayout')

@section('title', 'Deleted Laptop')

@section('content')
    <h1>Deleted Laptop List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/Laptops" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div> 
    @endif
    </div>

    <div my-5>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedLaptops as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->laptop_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <a href="laptop-restore/{{$item->slug}}">restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection