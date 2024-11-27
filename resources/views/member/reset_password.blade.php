<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Reset Password</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">

        <form method="POST" action="{{ route('member.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">
            <div>
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" id="email" name="email" value="{{ request()->email }}" readonly>
                </label>
            </div>
            <br>
            <div>
                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" id="password" name="password" placeholder="New Password">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </label>
            </div>
            <div>
                <br>
                <label for="password_confirmation" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Comfirm Password">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </label>
            </div>
            <br>
            <button type="submit" class="cmn-btn">Reset Password</button>
        </form>
    </div> --}}
    <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">
        <form method="POST" action="{{ route('member.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                        readonly>
                </label>
            </div>
            <div class="form-group">
                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" name="password" placeholder="New Password">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </label>
            </div>
            <div class="form-group">
                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </label>
            </div>
            <button type="submit" class="cmn-btn">Reset Password</button>
        </form>
    </div>

</body>

</html>
