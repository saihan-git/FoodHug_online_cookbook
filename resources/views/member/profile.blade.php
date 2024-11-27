<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Profile</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="POST" action="{{ route('member.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Profile Image</h2>
            <div class="form-group">
                @if ($member->image)
                    <img src="{{ asset('images/' . $member->image) }}" alt="Profile Photo" class="profile-photo">
                @endif
                <input type="file" id="image" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="icon-label">
                    <img src="{{ asset('images/name.png') }}" alt="Name Icon" class="icon">
                    <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}">
                </label>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" id="email" name="email" value="{{ old('email', $member->email) }}">
                </label>
            </div>

            <button type="submit" class="cmn-btn">Update Profile</button>
        </form>

    </div>
</body>

</html>
