@extends('dashboard.layout.main')
@section('container')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>
    @endif

    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>
    @endif

    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      @can('admin')
        <h2 class="display-2">Welcome Admin</h2>
      @endcan

      @cannot('admin')
        <h2 class="display-2">Welcome Non Admin</h2>
      @endcannot

      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/categories/create" class="btn btn-sm btn-outline-secondary">
          <span data-feather="file-plus"></span>
          Create New Category
        </a>
      </div>
    </div>

    @if ($input == 'post')
      <form action="/dashboard/categories" method="post" class="col-md-7">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="{{ $placeholder }}"
            value="{{ old('name') }}" name="name">
          <button class="btn btn-outline-secondary"
            type="submit">{{ $button }}</button>
        </div>
      </form>
    @endif

    @if ($input == 'edit')
      <form action="/dashboard/categories/{{ $editCategory->slug }}" method="post"
        class="col-md-7">
        @csrf
        @method('put')
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="{{ $placeholder }}"
            value="{{ old('name', $editCategory->name) }}" name="name">
          <button class="btn btn-outline-secondary"
            type="submit">{{ $button }}</button>
        </div>
      </form>
    @endif

    <div class="card col-md-7">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Category</th>
              <th scope="col" class="col-4 col-md-3 text-center">actions</th>
            </tr>
          </thead>
          <tbody>
            {{-- @can('admin') --}}
            @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  {{ $category->name }}</td>
                <td class="text-center">

                  <a href="/dashboard/categories/{{ $category->slug }}/edit"
                    class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="edit">
                    <span data-feather="edit"></span></a>
                  <form action="/dashboard/categories/{{ $category->slug }}"
                    method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm " data-bs-toggle="tooltip"
                      data-bs-placement="left" title="delete">
                      <span data-feather="trash-2"></span></button>
                  </form>
                </td>
              </tr>
            @endforeach
            {{-- @endcan --}}
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
