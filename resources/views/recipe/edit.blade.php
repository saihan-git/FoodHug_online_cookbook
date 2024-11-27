@extends('frontend.template')
@section('content')

    <div class="container card my-md-5 py-md-5 " style="margin-top: 180px !important;" >        
        <div class="row py-md-5 ">           
            <div class="col-12 offset-md-2 col-md-8">
                <h3 class="text-center">Recipe Edit Form</h3>
                <form action="{{route('recipes.update',$recipe->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-5 mt-0 mt-md-4">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="chicken curry" value="{{ old('name', $recipe->name) }}">
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
                                <img src="{{ $recipe->photo }}" alt="" class="w-25 h-25 my-3">
                                <input type="hidden" name="old_image" value="{{ $recipe->photo }}">
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
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select class="form-select @error('name') is-invalid @enderror" name="category_id" aria-label="Default select example">
                            <option value="0">Choose One Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="review-text">Ingradient</label>
                        <textarea id="Ingradient" name="ingredient" class="@error('ingredient') is-invalid @enderror">{{$recipe->ingredient}}</textarea>
                        @error('ingredient')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="review-text">Instruction</label>
                        <textarea id="Instruction" name="instruction" class="@error('instruction') is-invalid @enderror">{{$recipe->instruction}}</textarea>
                        @error('instruction')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success my-3 float-end px-5 py-2"> Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#Ingradient').summernote({
                placeholder: 'Write your review here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#Instruction').summernote({
                placeholder: 'Write your review here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection