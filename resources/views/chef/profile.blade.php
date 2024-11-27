<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Profile</title>
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
        <form action="{{ route('chef.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Profile Image</h2>

            <div class="form-group">

                @if ($chef->image)
                <img src="{{ asset('images/' . $chef->image) }}" alt="Profile Photo" class="profile-photo">
                @endif


                <input type="file" id="image" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="icon-label">
                    <img src="{{ asset('images/name.png') }}" alt="Name Icon" class="icon">
                    <input type="text" name="name" class="form-control" value="{{ $chef->name }}" >
                </label>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="icon-label">
                    <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="icon">
                    <input type="email" name="email" class="form-control" value="{{ $chef->email }}" >
                </label>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="specialty" class="icon-label">
                    <img src="{{ asset('images/cuisine.png') }}" alt="Cuisine Icon" class="icon">
                    <input type="text" name="specialty" class="form-control" value="{{ $chef->specialty }}">
                </label>
                @error('specialty')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="cmn-btn">Update Profile</button>
        </form>
        <br>
        <a href="{{ route('chef.login') }}">Log out</a>
    </div>



</body>

</html>
