<!doctype html>

<html lang="jp">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <style>
        .user-register {
            height: 100vh;
            background: #d2d6de;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-register__box {
             width: 35%;
             background: #ffffff;
             padding: 25px 35px;
         }
    </style>
</head>

<body>
<div class="user-register">
    <div class="user-register__box">
        <div class="text-center mb-4"><h2>Register</h2></div>
        <form action="{{ route('post-register') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="user-register__action pt-2 text-center">
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

