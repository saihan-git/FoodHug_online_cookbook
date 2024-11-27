<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Forgot Password</title>
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
        <form method="POST" action="{{ route('member.password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" name="email" id="email" placeholder="Email">
                </label>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <button type="submit" class="cmn-btn">Send Mail</button>
        </form>
    </div>
</body>

</html>