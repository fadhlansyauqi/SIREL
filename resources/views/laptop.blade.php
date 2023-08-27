@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Laptop List</h1>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
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
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="#">edit</a>
                            <a href="#">delete</a>
                        </td>>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection