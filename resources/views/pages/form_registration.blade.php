<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                <li class="list-group-item active">Đăng ký thông tin khách hàng.</li>
                <li class="list-group-item">
                    <form action="{{ Route('registration') }}" method="post">
                        {{ csrf_field() }}
                        @csrf
                        <div class="form-group">
                            <label for="my-input">Name: </label>
                            <input id="my-input" class="form-control" type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Email: </label>
                            <input id="my-input" class="form-control" type="email" name="email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Password: </label>
                            <input id="my-input" class="form-control" type="password" name="password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Address: </label>
                            <input id="my-input" class="form-control" type="text" name="address" required="required">
                        </div>
                        <div class="form-group">
                            <label style="display: block">Sex: </label>
                            <label class="radio-inline">
                                 <input type="radio" name="sex" checked="checked" value="Nam">Nam
                            </label>
                            <label class="radio-inline">
                                 <input type="radio" name="sex" value="Nữ">Nữ
                            </label>
                       </div>
                       <div class="form-group">
                            <label for="my-input">Phone: </label>
                            <input id="my-input" class="form-control" type="text" name="phone" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Registration</button>
                    </form>
                </li>
            </ul>
    </div>
    
</body>
</html>