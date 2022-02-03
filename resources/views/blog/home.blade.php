@extends('blog.layout.main')

@section('container')
  <div class="container col-11 col-md-10">
    {{-- @dd($posts[0]->category) --}}
    <div class="row justify-content-center">
      <div class="col-md-12 mt-3">
        <h1 class="display-1">{{ $title }}</h1>
      </div>
      <div class="col-md-3 border-end border-info d-none d-md-block pt-3">
        <div class="border-bottom">
          <h3 class="display-3 text-secondary">Contributors</h3>
          @foreach ($users as $user)
            <div class="mb-2">

              <a href="/posts?user={{ $user->username }}"
                class="btn ">{{ $user->name }}</a>

            </div>
          @endforeach
          <h3 class="display-3 mt-3 text-secondary">Categories</h3>
          @foreach ($categories as $category)
            <div>
              <a href="/posts?category={{ $category->slug }}"
                class="btn ">{{ $category->name }}</a>
            </div>
          @endforeach
        </div>

      </div>
      <div class="col-md-9">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
              aria-label="Close"></button>
          </div>
        @endif
        @include('blog.layout.postcontent')
      </div>

    </div>

  </div>
@endsection
