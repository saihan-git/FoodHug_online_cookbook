@extends('frontend.template')
@section('content')

    <div class="container card my-md-5 py-md-5 " style="margin-top: 180px !important;" >        
        <div class="row py-md-5 ">           
            <div class="col-12 offset-md-2 col-md-8">
                <h3 class="text-center">Recipe Create Form</h3>
                <form action="{{route('recipes.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="chicken curry" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>  
                    <div class="form-group mb-3">
                        <label>Photo</label>
                        <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" id="name" placeholder="chicken curry">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>                  
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select class="form-select @error('name') is-invalid @enderror" name="category_id" aria-label="Default select example">
                            <option value="0">Choose One Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                        <textarea id="Ingradient" name="ingredient" class="@error('ingredient') is-invalid @enderror"></textarea>
                        @error('ingredient')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="review-text">Instruction</label>
                        <textarea id="Instruction" name="instruction" class="@error('instruction') is-invalid @enderror"></textarea>
                        @error('instruction')
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