@extends('frontend.template')
@section('content')

   <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('template/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Organic Food Is Good For Health</h1>
                                    <a href="curry.html" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('template/img/carousel-2.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Natural Food Is Always Healthy</h1>
                                    <a href="curry.html" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Recipe Category</h1>
        </div>
        <section class="customer-logos slider">
            @foreach ($categories as $category)
                <div class="slide border ">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        {{-- <img class="img-fluid mb-4" src="{{$category->photo}}" alt="" style="width: 200px; height: 150px;border-radius: 50%;"> --}}
                        <a href="{{route('filter_category',$category->id)}}"><img class="img-fluid mb-4" src="{{$category->photo}}" alt="" style="width: 200px; height: 150px;border-radius: 50%;"></a>
                        <h4 class="mb-3">{{$category->name}}</h4>
                    </div>
                </div>
            @endforeach
        </section>
    </div>

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Recipe Menu</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>                
            </div>
            <div class="row g-4">
                @foreach ($recipes as $recipe)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100 h-100" src="{{ $recipe->photo }}" alt="">
                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $recipe->category->name }}</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{route('recipe_detail',$recipe->id)}}">{{$recipe->name}}</a>
                                @php
                                    $rate = round($recipe->ratings_avg_rating, 0);
                                @endphp                               
                                
                                <span class="me-1">
                                    @for ($i = 0; $i < $rate; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    @for ($i = $rate; $i < 5; $i++)
                                        <i class="fa fa-star d-inline"></i>
                                    @endfor
                                </span>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-100 text-center py-2">
                                    <a class="text-body" href="{{route('recipe_detail',$recipe->id)}}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('recipe_items')}}">More Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [
                {
                    breakpoint: 960,
                    settings: {
                        slidesToShow: 3
                    }
                },{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    </script>
@endsection
