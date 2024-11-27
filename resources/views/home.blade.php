<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/main-logo.png') }}" alt="Centered Image">
        <a href="{{ route('admin.login') }}" class="cmn-btn">Log in as Admin</a>
        <a href="{{ route('chef.login') }}" class="cmn-btn">Log in as Chef</a>
        <a href="{{ route('member.login') }}" class="cmn-btn">Log in as Member</a>
    </div>
</body>

</html>
