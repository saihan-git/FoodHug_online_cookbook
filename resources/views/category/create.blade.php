@extends('frontend.template')
@section('content')

    <div class="container card my-md-5 py-md-5 " style="margin-top: 180px !important;">        
        <div class="row py-md-5 ">           
            <div class="col-12 offset-md-3 col-md-6">
                <h3 class="text-center my-5">Category Create Form</h3>
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Category"  value="{{ old('name') }}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>  
                    <div class="form-group mb-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>                  
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success my-3 float-end px-5 py-2"> Save </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection