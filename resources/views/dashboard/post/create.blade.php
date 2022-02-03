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
      <h2 class="display-2">Create new post</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/posts" class="btn btn-sm btn-outline-secondary">
          <span data-feather="x-circle"></span>
          Cancel posting
        </a>
      </div>
    </div>

    <form action="/dashboard/posts" enctype="multipart/form-data" method="post">
      @csrf
      <div class="card col-md-9 p-2 mb-5">

        @error('title')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-floating mb-3">
          <input type="title" class="form-control @error('title')is-invalid @enderror"
            id="title" name="title" value="{{ old('title') }}" placeholder="Title">
          <label for="title">Title</label>
        </div>

        @error('category_id')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-floating mb-3">
          <select class="form-select  @error('category_id')is-invalid @enderror"
            id="category_id" name="category_id" value="{{ old('category_id') }}">
            @foreach ($categories as $category)
              @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}
                </option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}
                </option>
              @endif
            @endforeach
          </select>
          <label for="category_id">select category</label>
        </div>


        <div class="mb-3">
          <label for="image" class="form-label">Select Image</label>
          @error('image')
            <small class="text-danger">{{ $message }}</small>
          @enderror

          <img class="img-preview img-fluid mb-3"
            style="object-fit: cover; border-radius:3px">
          <input
            class="form-control form-control-sm @error('image')is-invalid @enderror"
            id="image" name=image type="file" onchange="previewImage()">
        </div>

        <label for="body" class="form-label">Select Body</label>
        @error('body')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-floating mb-3">

          <input id="body" value="{{ old('body') }}" type="hidden" name="body">
          <trix-editor input="body"></trix-editor>

        </div>

        <button class="btn btn-primary w-25" type="submit">submit</button>

      </div>
    </form>
    <script>
      function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;


          imgPreview.style.display = "block";
          imgPreview.style.width = "150px"
          imgPreview.style.height = "125px"

        }
      }
    </script>

  </main>
@endsection
