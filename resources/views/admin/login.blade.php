<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                </label>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Password Icon" class="icon">
                    <input type="password" name="password" id="password" placeholder="Password">
                </label>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <a href="{{ route('admin.password.request') }}" class="forgot-password-btn">Forgot Password?</a>
            </div>
            <button type="submit" class="cmn-btn">Log in</button>
        </form>
    </div>
</body>

</html>
