<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reset Password</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/account.png') }}" alt="Centered Image">

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">
            <div>
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" id="email" name="email" value="{{ request()->email }}" readonly>
                </label>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <br>
            <div>
                <label for="password" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" id="password" name="password" placeholder="New Password">
                </label>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div>
                <br>
                <label for="password_confirmation" class="icon-label">
                    <img src="{{ asset('images/lock.png') }}" alt="Lock Icon" class="icon">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password">
                </label>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <br>
            <button type="submit" class="cmn-btn">Reset Password</button>
        </form>

        {{-- <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request('token') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">
        
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" required>
            </div>
        
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
        
            <button type="submit">Reset Password</button>
        </form> --}}
    </div>
</body>

</html>
