@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 p-5">
            <h3>Edit Profile</h3>
            <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        
            @csrf
            @method('PATCH')
        
            <div class="form-group row mt-4">
               
                <label for="url" class="col-md-2 col-form-label">{{ __('Personal url') }}</label>

                <input id="url" 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror col-md-10" 
                        name="url" 
                        value="{{ old('url') ?? $user->profile->url}}" 
                        autocomplete="url" autofocus>

                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="form-group row">
               
                <label for="description" class="col-md-2 col-form-label">{{ __('Bio') }}</label>

                <textarea id="description" 
                            name="description"
                            class="form-control @error('description') is-invalid @enderror col-md-10"
                            value="{{ old('description') ?? $user->profile->description }}"  
                            autocomplete="description"
                            placeholder="Let poeple know something about you"
                            autofocus rows="5">{{ old('description') ?? $user->profile->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="form-group row">
                
                <label for="image" class="col-md-2 col-form-label">Profile Image</label>
                
                <input type="file" class="form-control-file @error('image') is-invalid @enderror p-1 col-md-10" id="image" name="image">
                
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="row pt-4 justify-content-center">
                <div>
                     <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>

        </div>
    </div>
    </form>
</div>


@endsection
