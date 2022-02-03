@extends('dashboard.layout.main')
@section('container')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>
    @endif
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h2 class="display-2">Post Summary</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/posts/create" class="btn btn-sm btn-outline-secondary">
          <span data-feather="file-plus"></span>
          Create New Post
        </a>
      </div>
    </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th class=" d-md-block d-none" scope="col">Category</th>
              <th scope="col" class="col-4 col-md-3 text-center">actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class=" text-capitalize">{{ $post->title }}</td>
                <td class="d-md-block d-none text-capitalize" style="height: 3rem">
                  {{ $post->category->name }}</td>
                <td class="text-center">
                  <a href="/dashboard/posts/{{ $post->slug }}"
                    class="btn text-light btn-success btn-sm" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="show">
                    <span data-feather="eye"></span></a>

                  <a href="/dashboard/posts/{{ $post->slug }}/edit"
                    class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="edit">
                    <span data-feather="edit"></span></a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm " data-bs-toggle="tooltip"
                      data-bs-placement="left" title="delete">
                      <span data-feather="trash-2"></span></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>
  </main>
@endsection
