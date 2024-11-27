<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Forgot Password</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">
        @if (session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('chef.password.email') }}">
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
            <button type="submit" class="cmn-btn">Send Email</button>
        </form>
    </div>
</body>

</html>
