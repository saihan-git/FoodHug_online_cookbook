@extends('frontend.template')
@section('content')
   
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Our Recipes</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ route('index')}}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Our Recipes</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-12">
                    <form action="{{route('recipe_search')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search_name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>                
            </div>
            @php
                use Illuminate\Database\Eloquent\Collection;
                use Illuminate\Pagination\Paginator;
                use Illuminate\Pagination\LengthAwarePaginator;

                $isCollection = $recipes instanceof Collection;
                
            @endphp

            <div class="row g-4">
                @foreach ($recipes as $recipe)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100 h-100" src="{{$recipe->photo}}" alt="">
                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$recipe->category->name}}</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="">{{$recipe->name}}</a>
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
                @if (!($isCollection))
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            {{ $recipes->links() }}
                        </div>
                    </div>
                    
                @endif
                
                
                
            </div>
        </div>
    </div>
    
    <!-- Product End -->   

@endsection

@section('script')

@endsection
