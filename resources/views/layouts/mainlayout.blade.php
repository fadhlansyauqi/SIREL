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

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            padding: 15px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
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
                        <ul>
                            @if(Auth::user()->role_id == 1)
                                <li>
                                    <a href="#">Dahboard</a>
                                </li>
                                <li>
                                    <a href="#">Laptops</a>
                                </li>
                                <li>Categories</li>
                                <li>Users</li>
                                <li>Rent Log</li>
                                <li>Logout</li>
                            @else
                                <li>Profile</li>
                                <li>Logout</li>
                            @endif
                        </ul>
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