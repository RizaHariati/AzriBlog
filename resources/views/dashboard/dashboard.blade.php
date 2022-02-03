@extends('dashboard.layout.main')
@section('container')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="display-3">Welcome {{ auth()->user()->name }}</h3>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/registers/edit" class="btn btn-sm btn-outline-secondary">
          <span data-feather="user"></span>
          Edit Profile
        </a>
      </div>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
          aria-label="Close"></button>
      </div>
    @endif
    <h2 class="display-2">About you</h2>
    <div class="row justify-content-center">

      <div class="col-md-7">
        <div class="card p-2 p-md-3">
          <img src="http://source.unsplash.com/100x100/?{{ $gender }}"
            class="rounded-circle m-auto mb-3" style="object-fit: cover" width="100px"
            height="100px" alt="gender">
          <div class="input-group mb-3">
            <span class="input-group-text w-25" id="basic-addon3">Name</span>
            <input type="text" class="form-control bg-white"
              value="{{ auth()->user()->name }}" aria-describedby="basic-addon3"
              readonly>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text w-25" id="basic-addon3">Email</span>
            <input type="text" class="form-control bg-white"
              value="{{ auth()->user()->email }}" aria-describedby="basic-addon3"
              readonly>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text w-25" id="basic-addon3">Gender</span>
            <input value={{ auth()->user()->gender == 0 ? 'Female' : 'Male' }}
              type="text" class="form-control bg-white" placeholder="name"
              aria-describedby="basic-addon3" readonly>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text w-25" id="basic-addon3">Total Posts</span>
            <input type="text" class="form-control bg-white" placeholder="name"
              value={{ $total }} aria-describedby="basic-addon3" readonly>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
