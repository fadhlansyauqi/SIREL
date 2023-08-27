@extends('layouts.mainlayout')

@section('title', 'Edit Laptop')

@section('content')
    <h1>Edit Laptop</h1>

    <div class="mt-5 w-50">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/laptop-edit/{{$laptop->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="laptop_code" id="code" class="form-control" placeholder="Laptop Code" value="{{ $laptop->laptop_code}}">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Laptop title" value="{{ $laptop->title}}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display:block">Current Image</label>
                @if ($laptop->cover!='')
                    <img src="{{ asset('storage/cover/'.$laptop->cover) }}" alt="" width="300px">
                @else
                    <img src="{{ asset('images/no-img.jpg') }}" alt="" width="300px">
                @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="currentCategories" class="form-label"> Current Categories</label>
                <ul>
                    @foreach ($laptop->categories as $category)
                        <li>{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection