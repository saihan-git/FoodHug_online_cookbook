@extends('frontend.template')
@section('content')

    <div class="container card my-md-5 py-md-5 " style="margin-top: 180px !important;">        
        <div class="row py-md-5 ">           
            <div class="col-12 offset-md-3 col-md-6">
                <h3 class="text-center my-5">Category Edit Form</h3>
                <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-5 mt-0 mt-md-4">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Category"  value="{{ old('name', $category->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>  

                    <!-- Image -->
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="true">Old Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                                <img src="{{ $category->photo }}" alt="" class="w-25 h-25 my-3">
                                <input type="hidden" name="old_image" value="{{ $category->photo }}">
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" accept="image/*" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo">
                                @if ($errors->has('photo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('photo') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success my-3 float-end px-5 py-2"> Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection