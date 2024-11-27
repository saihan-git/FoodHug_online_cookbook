@extends('frontend.template')
@section('content')

    <div class="container card my-md-5 py-md-5 " style="margin-top: 180px !important;">        
        <div class="row py-md-5 ">           
            <div class="col-12 offset-md-3 col-md-6">
                <h3 class="text-center my-5">Update Profile</h3>
                <form action="{{route('profile.store')}}" method="post">
                    @csrf
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Category"   value="{{ old('name', $user->name) }}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Category"   value="{{ old('email', $user->email) }}" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Category" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-0 mt-md-4">
                        <label for="password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"  >
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>  
                    @if (!($user->role == "Admin"))                        
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="User" @if ($user->role == "User")
                                    selected
                                @endif>User</option>
                                <option value="Cheft" @if ($user->role == "Cheft")
                                    selected
                                @endif>Cheft</option>
                            </select>
                        </div>   
                    @endif 

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success my-3 float-end px-5 py-2"> Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection