@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"
      aria-label="Close"></button>
  </div>
@endif
@extends('dashboard.layout.main')
@section('container')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="display-2 text-capitalize">{{ $post->title }}</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/posts/{{ $post->slug }}/edit"
          class="btn btn-sm btn-outline-secondary">
          <span data-feather="edit"></span>
          Edit Post
        </a>
      </div>
    </div>

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
            <h5 class="display-3">{{ rtrim($post->title, '.') }}</h5>
            <small class="card-text">By : <a class="text-info"
                href="/posts?user={{ $post->user->username }}">
                {{ $post->user->name }}
              </a> in :
              <a class="text-info"
                href="/posts?category={{ $post->category->slug }}">
                {{ $post->category->name }}
              </a> , published : {{ $post->created_at->diffForHumans() }}
            </small>
            <p class="text-primary">{!! $post->body !!}</p>
            <a href="/dashboard/posts" class="btn text-light btn-info">Back to
              Dashboard Posts</a>
          </div>
        </div>

      </div>
  </main>
@endsection
