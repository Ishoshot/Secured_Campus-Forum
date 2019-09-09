@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 p-5">
            <h3>Edit Post</h3>
        	<form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        		@csrf
                @method('PATCH')
        
            <div class="form-group row mt-4">
               
                <label for="title" class="col-md-2 col-form-label">{{ __('Post Title') }}</label>

                <input id="title"
                		type="text"
                		class="form-control @error('title') is-invalid @enderror col-md-10" 
                		name="title" 
                        value="{{ old('title') ?? $post->title}}"
                		autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="form-group row mt-4">
               
                <label for="category" class="col-md-2 col-form-label">{{ __('Post Category') }}</label>
    
                <select id="category"
                        type="text"
                        class="form-control @error('category') is-invalid @enderror col-md-10" 
                        name="category"
                        value="{{ old('category') ?? $post->category}}"
                        autocomplete="category" autofocus>
                
                        <option value="">~ Please Re-Select Category ~</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach

                </select>
    
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="form-group row">
               
                <label for="description" class="col-md-2 col-form-label">{{ __('Post Description') }}</label>

                <textarea id="description" 
                			name="description"
                            value="{{ old('description') ?? $post->description}}"
               				class="form-control @error('description') is-invalid @enderror col-md-10"
                			autocomplete="description"
                			autofocus rows="5"> {{ old('description') ?? $post->description}}
                </textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="form-group row">
                
                <label for="image" class="col-md-2 col-form-label">Post Image</label>
                
                <input type="file" class="form-control-file @error('image') is-invalid @enderror p-1 col-md-10" id="image" name="image">
                
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="d-flex row pt-4 justify-content-between">
            	<div>
	                 <button class="btn btn-danger" type="reset">Reset</button>
            	</div>
                <div>
                     <button class="btn btn-primary">Create Post</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>


@endsection
