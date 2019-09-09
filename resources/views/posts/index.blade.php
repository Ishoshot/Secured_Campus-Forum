@extends('layouts.app')

@section('content')
 
<!-- section -->
<div class="section">
<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row">
        
        <div class="col-md-8">
            
            <div class="row">
                
                @forelse ($posts as $post)
                
                <div class="col-md-12 mb-5">
                    
                    <div class="post post-row">
                        
                        <a class="post-img" href="/posts/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" alt="Post Image">
                        </a>
                        
                        <div class="post-body">
                            
                            <div class="post-meta">
                                <a class="post-category cat-2" href="/posts/categories/{{ $post->category->id }}">{{ $post->category->title }}</a>
                                <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            <h3 class="post-title">
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h3>
                            
                            <p class="text-justify">
                                {{ str_limit($post->description, $limit = 300, $end = '...') }}
                                <a href="/posts/{{ $post->id }}" class="btn btn-primary btn-sm" role="button"> 
                                    Read More
                                </a>
                            </p>
                            
                            <div class="post-meta">
                                <span class="post-date">
                                    <i class="fa fa-user"></i> 
                                    {{ $post->user->username }}
                                </span>
                                <span class="post-date ml-5">
                                    <i class="fa fa-comments"></i> 
                                    {{ count($post->comments).' '. 'Comment(s)' }} 
                                </span>
                                <span class="post-date ml-5">
                                    <i class="fa fa-arrow-right"></i> 
                                    <a href="/profile/{{ $post->user->id }}">View Profile</a> 
                                </span>
                            </div>
                        
                        </div>
                
                    </div>
                
                </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                All Posts
                            </div>
                            <div class="card-body">
                                Oops! There are no posts yet.
                            </div>
                        </div>
                    </div>
                @endforelse
            
                
                <div class="col-12">
                    {{ $posts->links() }}
                </div>  

            </div>
        
        </div>






        <div class="col-md-4">
            
            <div class="aside-widget">
                <h3 class="">Most Read</h3>
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
                            {{ "No Most Read Post" }}
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
            
            {{-- <!tags>
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
            <! /tags> --}}
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->

@endsection
