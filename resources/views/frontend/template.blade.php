<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FoodHug</title>
    <link rel="icon" href="{{ asset('template/img/logo.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="{{ asset('template/fontawesome/css/all.min.css') }}">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- summernote --}}
    {{-- <link href="{{asset('template/css/summernote.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, Shan Township, Myanmar</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>contact@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            {{-- <a href="{{route('index')}}" class="navbar-brand ms-4 ms-lg-0"> --}}
            <img src="{{ asset('template/img/logo.png') }}" alt="" style="width: 80px; height: 90px;"
                class="ms-md-5">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    {{-- <a href="{{route('index')}}" class="nav-item nav-link active">Home</a> --}}
                    {{-- <a href="{{route('recipe_items')}}" class="nav-item nav-link">Our Recipes</a> --}}
                    {{-- <a href="{{ route('about')}}" class="nav-item nav-link">About Us</a> --}}
                    {{-- <a href="{{ route('contact')}}" class="nav-item nav-link">Contact Us</a> --}}
                    @if (!Auth::check())
                 <a href="" class="nav-item nav-link">Login</a>
                   <a href="" class="nav-item nav-link">Register</a>           
                    @else
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <small class="fa fa-user text-body"></small>
                                <span class="mt-1">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('profile', Auth::id()) }}" class="dropdown-item">Profile</a>
                                @if ((Auth::check() && Auth::user()->role == 'Admin') || (Auth::check() && Auth::user()->role == 'Cheft'))
                                    {{-- <a href="{{ route('categories.index') }}" class="dropdown-item">Category</a> --}}
                                    {{-- <a href="{{ route('recipes.index') }}" class="dropdown-item">Recipes</a> --}}
                                @endif

                                <a href="#" class="dropdown-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <input type="submit" value="Logout" class="form-control">
                                    </form>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">ood</span>Hug</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, Shan Township, Myanmar</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    {{-- <a class="btn btn-link" href="{{route('about')}}">About Us</a> --}}
                    {{-- <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a> --}}
                    {{-- <a class="btn btn-link" href="{{route('recipe_items')}}">Our Recipes</a> --}}
                    {{-- <a class="btn btn-link" href="#">Terms & Condition</a> --}}
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">FoodHug</a> , All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a href="#">FoodHug</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fas fa-long-arrow-alt-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/slick.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

    {{-- summernote --}}
    <script src="{{ asset('template/js/summernote.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>

    @yield('script')

</body>

</html>
