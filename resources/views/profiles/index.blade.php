@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row mt-3 justify-content-center">
        <div class="col-4">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100"/>
        </div>
    </div>

    <div class="row mt-3 text-center">
        <div class="col-12">
            <div class="h2 font-weight-bold">{{$user->profile->name}}</div>
            <div class="h5 font-weight-bold">{{"@".$user->username}}</div>
        </div>
    </div>


    <div class="row justify-content-center mt-2">
        <div class="col-8">
            
            <div class="d-flex justify-content-between align-items-baseline">
                
                @can('update', $user->profile)               
                    <a href="/profile/{{$user->id}}/edit" class="btn btn-success btn-sm">Edit Profile</a>
                @endcan
                
                @can('update', $user->profile)
                    <a href="/posts/create" class="btn btn-primary btn-sm">Add New Post</a>
                @endcan 
            
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex pt-3 justify-content-between">
                <div class="">No of Posts: <b>{{ $postCount }}</b></div>
                <div class="">Joined date: <strong>{{ $user->created_at->diffForHumans() }}</strong></div>
            </div>
        </div>
    </div>

    <hr/>
            
    <div class="row mt-2">
        
        <div class="col-md-8">
            <div class="text text-justify">
                <i class="fa fa-info"> Bio: </i><br/>
                {{$user->profile->description}}
            </div>

            <div class="mt-2">
                <a href="{{ $user->profile->url }}" target="_blank">{{$user->profile->url}}</a> ||
                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </div>
        </div>


        <div class="col-md-4 mt-4">
            <div class="d-flex justify-content-between">
                <div class="pt-2 font-weight-bold">
                    {{$user->matric}}
                </div>

                 <div class="pt-2 font-weight-bold">
                    {{$user->phone}}
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="pt-2 font-weight-bold">
                    {{$user->department}}
                </div>
                
                 <div class="pt-2 font-weight-bold">
                    {{$user->level}}
                </div>
            </div>
        </div>

    </div>

            
    <div class="row pt-5">
        @forelse ($user->posts as $post)            
            <div class="col-md-3 pb-5 pt-2">
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" style="" />
                </a>
                <p class="h5 font-weight-bold mt-2">{{ $post->title }}</p>
                <span class="font-weight-bold" style="font-size:12px;"><i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans() }}</span>
                <p class="text-justify">
                    {{ str_limit($post->description, $limit = 85, $end = '...') }}
                </p>
                <div class="d-flex justify-content-between">
                <a href="/posts/{{ $post->id }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                    @can('update', $user->profile)      
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary btn-sm">
                        <i class="fa fa-pencil"></i> Edit Post</a>
                    <form action="/posts/delete/{{ $post->id }}" method="POST" accept-charset="utf-8">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"> Delete</i>
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
            @empty
            <div class="alert alert-warning col-md-12 text-center">
                <p class="h4">There are no posts yet. To add, Click on the button below</p>
                <a href="/posts/create" class="btn btn-sm btn-primary">Add new post</a>
            </div>
        @endforelse
    </div>
</div>

@endsection
