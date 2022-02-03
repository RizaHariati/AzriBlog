@extends('blog.layout.main')

@section('container')
  <div class="container col-md-8">
    <div class="mt-3  d-inline-block">
      <div class="card border-light p-0 bg-white ">
        @if ($post->image)
          <img class="card-img-top w-100" height="350px" width="1000px"
            style="object-fit: cover" src="{{ asset('/storage/' . $post->image) }}"
            alt="{{ $post->category->slug }}">
        @else
          <img class="card-img-top w-100 d-sm-none d-md-block"
            src="http://source.unsplash.com/1000x300/?{{ $post->category->slug }}"
            alt="{{ $post->category->slug }}">
        @endif
        <div class="card-body">
          <h5 class="display-2 text-capitalize">{{ rtrim($post->title, '.') }}</h5>
          <small class="card-text">By : <a class="text-info"
              href="/posts?user={{ $post->user->username }}">
              {{ $post->user->name }}
            </a> in :
            <a class="text-info"
              href="/posts?category={{ $post->category->slug }}">
              {{ $post->category->name }}
            </a>
            , published : {{ $post->created_at->diffForHumans() }}
          </small>
          <p class="text-primary">{!! $post->body !!}</p>
          <a href="/posts" class="btn text-light btn-info">Back to Posts</a>
        </div>
      </div>

    </div>
  @endsection
