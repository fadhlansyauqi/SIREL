@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="#" class="btn btn-secondary me-3">View Banned User</a>
        <a href="#" class="btn btn-primary">New Registered User</a>
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td>
                            @if ($item->phone)
                                {{$item->phone}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="#">detail</a>
                            <a href="#">ban user</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection