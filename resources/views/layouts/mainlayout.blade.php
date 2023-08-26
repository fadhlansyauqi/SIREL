<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIREL | @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    </head>
    <style>
        .main {
            height: 100vh;   
        }
  
        .sidebar {
            background: rgb(94, 94, 94);
            color: white;
        }

        

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 20px 10px;
        }

        .sidebar a:hover{
            background: #000 ;
        }
    </style>
    <body>
        <div class="main d-flex flex-column justify-content-between">
            <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
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
                                <a href="dashboard">Dashboard</a>
                                <a href="laptops">Laptops</a>
                                <a href="categories">Categories</a>
                                <a href="users">Users</a>
                                <a href="rent-logs">Rent Log</a>
                                <a href="logout">Logout</a>

                            @else
                                <a href="profile">Profile</a>
                                <a href="logout">Logout</a>
                            @endif
                    </div>
                    <div class="content p-5 col-lg-10">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

        <div>
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>