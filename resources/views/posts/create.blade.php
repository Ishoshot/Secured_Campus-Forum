@extends('layouts.app')

@section('content')
    
    <div class="row mt-5">

        <div class="container mt-3 mb-5">
        
        <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">

        <label for="title" class="col-md-2 col-form-label">{{ __('Post Title') }}</label>

        <input id="title" 
        name="title"
        type="text" 
        class="form-control @error('title') is-invalid @enderror col-md-10"
        autocomplete="title"
        autofocus rows="5" />

        @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        </div>


        <div class="form-group row">

        <label for="category" class="col-md-2 col-form-label">{{ __('Post category') }}</label>

        <select name="category" id="category" 
        class="form-control @error('category') is-invalid @enderror col-md-10">
            <option value="">~ Select a Category ~</option>
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
        class="form-control @error('description') is-invalid @enderror col-md-10"
        autocomplete="description"
        autofocus rows="5">
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

@endsection
