@extends('frontend.template')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Our Cheft Recipes</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Our Cheft Recipes</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row my-5">
                <div class="col-12">
                    <a class="btn btn-success float-end" href="{{ route('recipes.create')}}"> + New Recipe</a>
                </div>
            </div>
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
                            </div>
                            <div class="d-flex border-top">
                                @if ($recipe->created_by == Auth::id() || Auth::user()->role == "Admin")
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body text-warning d-block" href="{{route('recipes.edit',$recipe->id)}}"><i class="fa fa-edit text-warning me-2"></i>Edit</a>   
                                    </small>
                                    <small class="w-50 text-center">
                                        <form method="post" action="{{ route('recipes.destroy', $recipe->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-body text-danger d-block btn-link " onclick="return confirm('Are you sure?')" style="margin: auto;">
                                                <i class="fa fa-trash text-danger me-2"></i>Delete
                                            </button>
                                        </form>                                    
                                    </small>
                                @else
                                    <small class="w-50 text-center border-end py-2">                                     
                                        <a class="text-body text-warning d-block" disabled><i class="fa fa-edit text-warning me-2"></i>Edit</a>  
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body text-danger d-block" disabled><i class="fa fa-trash text-danger me-2"></i>Delete</a>
                                    </small>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach  
                <div class="d-flex justify-content-end">
                    {{ $recipes->links() }}
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Product End -->  

@endsection

@section('script')
<script>
    // JavaScript to hide the alert after 3 seconds
    document.addEventListener('DOMContentLoaded', function () {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function () {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });
</script>
@endsection