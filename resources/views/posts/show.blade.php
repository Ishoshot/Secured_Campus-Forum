@extends('layouts.app')

@section('content')

<header id="header">
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url(/storage/{{ $post->image }});" class="w-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="/posts/categories/{{ $post->category->id }}">{{ $post->category->title }}</a>
                        <span class="post-date">
                           <i class="fa fa-clock-o ml-2"></i> {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <h1>{{ $post->title }}</h1>
                    <div class="post-meta">                       
                        <span class="post-date">
                            Posted by: <i class="fa fa-user ml-2"></i> {{ $post->user->username }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- section -->
<div class="section">
<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row">
        <!-- Post content -->
        <div class="col-md-8">
            <div class="section-row sticky-container">
                <div class="main-post">
                    <h3></h3>
                    <p class="text-justify">{{ $post->description }}</p>               
                </div>
                    
                {{-- @can('update', $post->user->profile) --}}
                <div class="post-shares sticky-shares">
                     {!! 
                    Share::page(url()->current())
                    ->facebook()
                    ->twitter()
                    ->googlePlus()
                    ->linkedin()
                    ->whatsapp()
                    !!}
                </div>
                {{-- @endcan --}}

            </div>

            <!-- author -->
            <div class="section-row p-4" style="background-color:rgba(0,0,0,0.04);">
                
                <div class="post-author">
                    
                    <div class="media row">
                        
                        <div class="media-left col-md-4">
                            <img class="media-object" src="{{ $post->user->profile->profileImage() }}" alt="">
                        </div>
                        
                        <div class="media-body col-md-8">
                            
                            <div class="media-heading">
                                <h3><i class="fa fa-user mr-3 pt-3"></i>{{ $post->user->profile->name }}</h3>
                            </div>
                            
                            <p class="text-justify">
                                {{ str_limit($post->user->profile->description, $limit = 100, $end = ' .....') }}
                            </p>
                            
                            <a href="/profile/{{ $post->user->id }}" class="">
                                <i class="fa fa-arrow-right">
                                 View Profile
                                </i>
                            </a>
                    
                        </div>
            
                    </div>
            
                </div>
            
            </div>
            <!-- /author -->


            <!-- comments -->
            <div class="section-row">
                <div class="section-title">
                    <h2>{{ count($post->comments)." ". "Comments" }}</h2>
                </div>

                <div class="post-comments">
                    @forelse($post->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="./img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>
                                        <i class="fa fa-user"></i>
                                        {{ $post->user->find($comment->user_id)->username }}
                                    </h4>
                                    <span class="time">
                                        <i class="fa fa-clock-o mr-2"></i>
                                        {{ $comment->created_at->diffForHumans() }} 
                                    </span>
                                </div>
                                <p class="text-justify">{{ $comment->body }}
                                @if ($comment->user_id === auth()->user()->id)
                                    <form action="/comments/delete/{{ $comment->id }}" method="POST" accept-charset="utf-8">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"> Del</i>
                                        </button>
                                    </form>
                                @endif
                                </p>
                            </div>
                        </div>
                    @empty
                    {{ "No coment(s) yet. Be the First to add!" }}
                    @endforelse
                    
                </div>
            </div>
            <!-- /comments -->

            <!-- reply -->
            <div class="section-row">
                <div class="section-title">
                    <h2>Add Comment:</h2>
                </div>

                <form class="post-reply" action="/posts/{{ $post->id }}/comments" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="comment" 
                                            id="comment" 
                                            autocomplete="off" 
                                            autofocus="on" 
                                            placeholder="Enter Comments here" 
                                            class="form-control  @error('comment') is-invalid @enderror"
                                            rows="5">
                                </textarea>
                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add Comment</button>
                        </div>
                    </div> {{-- row --}}
                </form>
            
            </div>
            <!-- /reply -->
                    
        </div>
        <!-- /Post content -->
        
        <div class="col-md-4">
            
            <div class="aside-widget text-justify">
                <h3 class="">You may also like:</h3>
                <ul class="list-group">
                    @forelse($mrPosts as $mrpost)
                        <li class="list-group-item" style="">
                        <div class="row">
                            <div class="col-3">
                                <img src="/storage/{{ $mrpost->image }}" alt="" class="w-100">   
                            </div>
                            <div class="col-9">
                                <a href="/posts/{{ $mrpost->id }}">
                                    {{ $mrpost->title }}
                                </a>
                                <p class="text-justify">{{ str_limit($mrpost->description, $limit = 60, $end = '...') }}</p>
                            </div>
                        </div>
                        </li>
                        @empty
                            {{ "Empty" }}
                    @endforelse  
                </ul>
            </div>

            
            <div class="aside-widget">
                <a href="#" class="">
                    <img src="/img/forum.gif" class="col-12" alt="">
                </a>
            </div>

            
            <!-- catagories -->
            <div class="aside-widget">
                <div class="section-title">
                    <h2>Catagories</h2>
                </div>
                <div class="category-widget">
                    <ul>
                        @forelse ($categories as $category)
                        <li><a href="/posts/categories/{{ $category->id }}" class="cat-1">{{ $category->title }}<span>{{ $category->posts->count() }}</span></a></li>
                        @empty
                        {{ "No Catagory" }}
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- /catagories -->
            
            {{-- <! tags>
            <div class="aside-widget">
                <div class="tags-widget">
                    <ul>
                        <li><a href="#">Chrome</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">Tutorial</a></li>
                        <li><a href="#">Backend</a></li>
                        <li><a href="#">JQuery</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">JavaScript</a></li>
                        <li><a href="#">Website</a></li>
                    </ul>
                </div>
            </div>
            <! /tags > --}}
        </div>  

    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->

@endsection
