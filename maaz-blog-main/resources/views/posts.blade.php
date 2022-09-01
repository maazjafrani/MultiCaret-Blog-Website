@extends('layouts.master')
@section('title','Posts')
@section('content')

    <div class="row tm-row">
        @foreach($posts as $post)
            <article class="col-6 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="{{route('posts',[$post->id])}}" class="effect-lily tm-post-link tm-pt-60">
                    @if ($post->image!=null)

                        <div class="tm-post-link-inner">
                            <img height="190" alt="Image" src="{{$post->image}}"/>

                        </div>

                    @else
                        <div class="tm-post-link-inner">
                            <img src="/img/img-03.jpg" alt="Image" class="img-fluid">

                        </div>
                    @endif

                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->content_name}}</h2>
                </a>
                <p class="tm-pt-30">
                    {{$post->excerpt}}
                </p>
                <div class="d-flex justify-content-between tm-pt-45">
                    <span class="tm-color-primary"><a
                            href="/author/{{$post->user->id}}">{{$post->user->name}}</a></span>
                    <span class="tm-color-primary">{{$post->created_at->diffForHumans()}}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></span>
                    <span><a href="/tags/{{$post->tag->slug}}">{{$post->tag->name}}</a></span>
                </div>
            </article>

        @endforeach
    </div>

@endsection


