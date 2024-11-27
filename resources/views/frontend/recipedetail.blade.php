@extends('frontend.template')
@section('content')
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Recipe Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Recipe Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6 wow fadeInUp" >
                    <div class="card">
                        <img class="img-fluid w-100" src="{{ $recipe->photo }}" alt="">                  

                    </div>
                </div>
                <div class="col-12 col-md-6 wow fadeInUp" >
                    <h3> {{ $recipe->name }} </h3>
                    <span class="badge bg-secondary">{{ $recipe->category->name }}</span>
                    <h6 class="mt-3">Creation By : {{ $recipe->createdBy->name }}</h6>
                </div>
                <div class="col-12 col-md-6 wow fadeInUp mt-5" >
                    <h3>Ingredients:</h3>
                    <p>
                        {!! $recipe->ingredient !!}
                    </p>
                </div>  
                <div class="col-12 col-md-6 wow fadeInUp mt-5" >
                    <h3>Instructions:</h3>
                    <p>
                        {!! $recipe->instruction !!}
                    </p>
                </div>                                    
            </div>
        </div>
    </div>

    @if(Auth::check())
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row">
                    <h3 class="text-center">Feedback and Reviews</h3>
                    @php
                        $star =$starRating->rating ?? 0;
                    @endphp  
                    @if ($star > 0)
                        <div class="star-rating justify-content-center">
                            <input type="radio" id="5-stars" name="rating" value="5" {{ $star == 5 ? 'checked' : '' }} />
                            <label for="5-stars" class="fa fa-star"></label>
                            <input type="radio" id="4-stars" name="rating" value="4" {{ $star == 4 ? 'checked' : '' }} />
                            <label for="4-stars" class="fa fa-star"></label>
                            <input type="radio" id="3-stars" name="rating" value="3" {{ $star == 3 ? 'checked' : '' }} />
                            <label for="3-stars" class="fa fa-star"></label>
                            <input type="radio" id="2-stars" name="rating" value="2" {{ $star == 2 ? 'checked' : '' }} />
                            <label for="2-stars" class="fa fa-star"></label>
                            <input type="radio" id="1-star" name="rating" value="1" {{ $star == 1 ? 'checked' : '' }} />
                            <label for="1-star" class="fa fa-star"></label>
                        </div>
                    @else
                        <div class="star-rating justify-content-center">
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="fa fa-star"></label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="fa fa-star"></label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="fa fa-star"></label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="fa fa-star"></label>
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="fa fa-star"></label>
                        </div>
                    @endif
                            
                    <form action="{{ route('review.store')}}" method="post">
                        @csrf
                        <input type="hidden" id="recipe_id" value="{{$recipe->id}}" name="recipe_id">

                        <div class="col-12 offset-md-3 col-md-6">
                            <input type="text" placeholder="please write review " class="form-control py-2 mt-3 @error('content') is-invalid @enderror" name="content">
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="col-12 offset-md-3 col-md-6  text-center mt-5">
                            <button type="submit" class="btn btn-secondary" style="border-radius: 10px;width: 40%;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if(!empty($reviews) && count($reviews) > 0)
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row">
                    <div class="card p-5" >
                        <h3>Reviews</h3>
                        @foreach ($reviews as $review)
                            @php
                                $user_id = $review->created_by;
                                $starRating=\App\Models\Rating::where(['created_by' => $user_id])->first();
                                $rate= $starRating->rating;

                            @endphp
                            <p style="margin: 0px;"> 
                                @for ($i = 0; $i < $rate; $i++)
                                    <i class="fa fa-star d-inline text-warning"></i>
                                @endfor
                                @for ($i = $rate; $i < 5; $i++)
                                    <i class="fa fa-star d-inline"></i>
                                @endfor
                            </p>
                            <div class="col-12">
                                <h6 class="d-inline-block mb-3"> <small class="fa fa-user text-body"></small> {{ $review->user->name}} </h6>  
                                <p class="ms-3">{{ $review->content}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
   
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function () {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });
    $(document).ready(function() {
        $('.star-rating input[type="radio"]').on('change', function() {
            var rating = $(this).val();
            var recipe_id = $('#recipe_id').val();
            $.ajax({
                url: '{{ route("rate.store") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rating: rating,
                    recipe_id: recipe_id
                },
                success: function(response) {
                    alert(response.message);
                }
            });
        });
    });
</script>
@endsection