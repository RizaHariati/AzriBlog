@extends('blog.layout.main')

@section('container')
  <div class="container col-md-9">
    @if ($posts->count() < 1)
      <div class="row mt-3 justify-content-center">
        <div class="col-12">
          <h2 class="display-2">{{ $title }}</h2>
        </div>
      </div>
    @else

      <form action="/posts">
        @if (request('user'))
          <input type="hidden" class="form-control" name="user"
            value="{{ request('user') }}" />
        @endif

        @if (request('category'))
          <input type="hidden" class="form-control" name="category"
            value="{{ request('category') }}" />
        @endif

        <div class="input-group mt-3">
          <input type="text" class="form-control" name="search"
            value="{{ request('search') }}" placeholder="Search post.."
            id="search" />
          <div class="input-group-append">
            <button class="btn btn-info  text-light" type="submit">Search</button>
          </div>
        </div>
      </form>

      <div class="row">
        <div class="row mt-3 justify-content-center">
          <div class="col-12">
            <h2 class="display-2">{{ $title }}</h2>
          </div>
        </div>
        <div class="container col-11 col-md-10">
          @include('blog.layout.postcontent')
        </div>
      </div>
      <div class="row mt-3 justify-content-center align-items-center">
        <div class="col-md-5 col-9"> {{ $posts->links() }}</div>
      </div>
    @endif
  </div>
@endsection
