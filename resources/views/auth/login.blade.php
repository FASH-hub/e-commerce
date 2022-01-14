<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Registration</title>
</head>
<body class="bg-gradient-to-r from-gray-100 to-blue-200">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h3>
                    Login
                </h3>
                <hr>
                <form action="{{route('login-user')}}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
<div class="form-group">
    
    <label for="email">E-mail adress</label>
    <input type="text" class="form-control" 
    placeholder="Please enter your e-mail adress" name="email" value="{{old('email')}}">
    <span class="text-danger">@error('email'){{ $message }} @enderror</span>

</div>
<br>

<div class="form-group">
    
    <label for="password">Password</label>
    <input type="password" class="form-control" 
    placeholder="Please enter your password" name="password" value="">
    <span class="text-danger">@error('password'){{ $message }} @enderror</span>

</div>
<br>

<div class="form-group">
    <button class="btn btn-block btn-primary" type="submit">login</button>
</div>
<br>
<a href= "register">No user account? Register here<a>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>