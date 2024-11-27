@extends('frontend.template')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Category</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    {{-- <li class="breadcrumb-item"><a class="text-body" href="{{route('index')}}">Home</a></li> --}}
                    <li class="breadcrumb-item text-dark active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row my-5">
                <div class="col-12">
                    <a class="btn btn-success float-end" href="{{ route('categories.create') }}"> + New Category</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100 h-100" src="{{ $category->photo }}" alt="">
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="">{{ $category->name }}</a>
                            </div>
                            <div class="d-flex border-top justify-content-center">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body text-warning d-block"
                                        href="{{ route('categories.edit', $category->id) }}"><i
                                            class="fa fa-edit text-warning me-2"></i>Edit</a>
                                </small>
                                <small class="w-50 text-center">
                                    <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-body text-danger d-block btn-link "
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash text-danger me-2"></i>Delete
                                        </button>
                                    </form>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // JavaScript to hide the alert after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(function() {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>
@endsection
