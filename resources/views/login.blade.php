<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIREL | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style> 
    body {
        background-image: url({{ asset('images/bg-sirel-login.png') }});
    }
    .main {
        height: 100vh;
        box-sizing: border-box; 
    }

    .login-box {
        width: 500px;
        border: solid 1px white;
        padding: 30px;
        background: white;
        border-radius: 10px;
    }
     

    form div {
        margin-bottom: 15px;
    }

    .btn {
        background: #527293;
        color: white;
    }

    .btn:hover {
        background: #3e566e;
        color: white;
    }
    
</style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
       <div class="login-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name ="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name ="password" id="password" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn form-control">Login</button>
                </div>
                <div class="text-center">
                   Belum punya akun? <a href="register" style="color: #527293">Sign Up</a>
                </div>
            </form>
       </div>

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>