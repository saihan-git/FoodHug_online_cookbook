<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/input-style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        @if (session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2>Profile Image</h2>
            <div>
                {{-- <label for="image">Profile Image</label> --}}
                @if ($admin->image)
                    <img src="{{ asset('images/' . $admin->image) }}" alt="Profile Photo" class="profile-photo">
                @endif


                <input type="file" id="image" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <br>
            <div>
                <label for="name" class="icon-label">
                    <img src="{{ asset('images/name.png') }}" alt="Name Icon" class="icon">
                    <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}">
                </label>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}">
                </label>
            </div>
            <br>

            <button type="submit" class="cmn-btn">Update Profile</button>
        </form>
        <br>
        <a href="{{ route('admin.login') }}">Log out</a>
    </div>

</body>

</html>
