<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <style>
        .main{
            width: 50%;
            margin: 40px auto;
        }
    </style>
</head>
<body>

    <div class="main">
            <ul class="list-group">
                <li class="list-group-item active">Đăng nhập tài khoản.</li>
                <li class="list-group-item">
                    <form action="{{ Route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="my-input">Email: </label>
                            <input id="my-input" class="form-control" type="email" name="email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Password: </label>
                            <input id="my-input" class="form-control" type="password" name="password" required="required">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Login</button>
                        <a  href="redirect/facebook" class="btn btn-outline-primary"><i class="fab fa-facebook-f"></i></a> 
                        <a href="{{ Route('formRegistration') }}" class="btn btn-outline-primary">Registration</a>
                        @csrf
                    </form>
                    @if (Session::has('errors'))
                        <p class="alert alert-danger">{{Session::get('errors')}}</p>
                    @endif
                    @if (Session::has('success'))
                        <p class="alert alert-danger">{{Session::get('success')}}</p>
                    @endif
                </li>
            </ul>
    </div>

   
</body>
</html>