<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIREL | @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="main d-flex flex-column justify-content-between">
            <nav class="navbar navbar-dark navbar-expand-lg ">
                <div class="container-fluid">
                    
                    <a class="navbar-brand" href="#">SIREL</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#buttonNavbar" aria-controls="buttonNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
            </nav>


            <div class="body-content h-100">
                <div class="row g-0 h-100">
                    <div class="sidebar col-lg-2 collapse d-lg-block" id="buttonNavbar">
                            @if(Auth::user()->role_id == 1)
                                <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>Dashboard</a>
                                <a href="/laptops" @if(request()->route()->uri == 'laptops' || request()->route()->uri == 'laptop-add' || request()->route()->uri == 'laptop-deleted' || request()->route()->uri == 'laptop-edit/{slug}' || request()->route()->uri == 'laptop-delete/{slug}') class='active' @endif>Laptops</a>
                                <a href="/categories" @if(request()->route()->uri == 'categories'  || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delete/{slug}') class='active' @endif>Categories</a>
                                <a href="/users"@if(request()->route()->uri == 'users') class='active' @endif>Users</a>
                                <a href="/rent-logs" @if(request()->route()->uri == 'rent-logs') class='active' @endif>Rent Log</a>
                                <a href="/logout">Logout</a>

                            @else
                                <a href="/profile"@if(request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                                <a href="/logout">Logout</a>
                            @endif
                    </div>
                    <div class="content p-5 col-lg-10">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>