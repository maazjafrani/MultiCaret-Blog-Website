@extends('layouts.master')
@section('title','Posts')
@section('content')
    <div class="container-fluid">

        <div class="row tm-row">


            <hr class="tm-hr-primary">

            @if ($post->image!=null)

                <div class="row tm-row">
                    <div class="col-12">
                        <hr class="tm-hr-primary tm-mb-55">
                        <img width="880" height="535" class="tm-mb-40"
                             src="{{$post->image}}">

                    </div>
                </div>

            @else

                <div class="row tm-row">
                    <div class="col-12">
                        <hr class="tm-hr-primary tm-mb-55">
                        <img width="880" height="535" class="tm-mb-40" src="/img/img-03.jpg">

                    </div>
                </div>
            @endif

            {{--        divs are below--}}
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">
                        <div class="mb-4">

                            <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->content_name}}</h2>

                            <p class="tm-pt-30">
                                {{$post->content}}
                            </p>
                            <div class="d-flex justify-content-between tm-pt-45">
                                <span class="tm-color-primary"><a
                                        href="/author/{{$post->user->id}}">{{$post->user->name}}</a></span>
                                <span class="tm-color-primary">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span><a
                                        href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></span>
                                <span><a href="/tags/{{$post->tag->slug}}">{{$post->tag->name}}</a></span>
                            </div>
                        </div>


                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            @foreach($comments as $comment)
                                <div>


                                    <hr class="tm-hr-primary tm-mb-45">
                                    <div class="tm-comment tm-mb-45">
                                        <figure class="tm-comment-figure">
                                            <img src="{{asset($comment->author->image)}}"
                                                 alt="Image"
                                                 width="50" height="50">
                                            <figcaption
                                                class="tm-color-primary text-center">{{$comment->author->name}}</figcaption>
                                        </figure>
                                        <div>
                                            <p>
                                                {{$comment->body}}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                @if(Auth::user()->id == $comment->user_id)
                                                    <a href="/delete/{{ $comment->id}}"
                                                       class="tm-color-primary btn-danger btn">
                                                        DELETE
                                                    </a>
                                                @endif


                                                <span class="tm-color-primary">{{ $comment->created_at->diffForHumans()}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <div class="text-center">
                                @auth
                                    <form method="post" action="{{route('comments',$post->id)}}"
                                          class="mb-5 tm-comment-form">
                                        @csrf
                                        <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                                        <div class="mb-4">
                                            <textarea placeholder="Want to say something?" class="form-control"
                                                      name="body" cols="50" rows="12"></textarea>
                                        </div>

                                        <div class="text-right">

                                            <button class="tm-btn tm-btn-primary tm-btn-small">Post</button>

                                        </div>


                                    </form>
                                @else
                                    <p>
                                        <a href="/login">Login to leave a comment!</a>
                                    </p>
                                @endauth


                            </div>
                        </div>
                    </div>
                </div>


                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            @foreach($categories as $category)
                                <li><a href="/categories/{{$post->category->slug}}"
                                       class="tm-color-primary">{{$category->name}}</a></li>
                            @endforeach

                        </ul>

                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>


                        @foreach($posts as $post)

                            <a href="/post/{{$post->id}}" class="d-block tm-mb-40">
                                @if ($post->image!=null)

                                    <figure>
                                        <img src="{{$post->image}}" alt="Image"
                                             class="mb-3 img-fluid">
                                        <figcaption class="tm-color-primary">{{$post->category->name}}
                                        </figcaption>
                                        <p>{{$post->content_name}}</p>

                                    </figure>

                                @else

                                    <figure>
                                        <img src="/img/img-02.jpg" alt="Image"
                                             class="mb-3 img-fluid">
                                        <figcaption class="tm-color-primary">{{$post->category->name}}
                                        </figcaption>
                                        <p>{{$post->content_name}}</p>

                                    </figure>

                                @endif

                            </a>
                        @endforeach

                    </div>
                </aside>
            </div>
        </div>

    </div>

@endsection



