<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Login</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">
        <form method="POST" action="{{ route('chef.login.submit') }}">
            @csrf
            <div class="form-group">

                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </label>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">

                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" id="password" name="password" placeholder="Password">
                </label>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <a href="{{ route('chef.password.request') }}" class="forgot-password-btn">Forgot Password?</a>
            </div>
            <button type="submit" class="cmn-btn">Login</button>
        </form>
    </div>
</body>

</html>
