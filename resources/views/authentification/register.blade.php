@extends('authentification.layout.main')

@section('container')
  <form action="/registers" method="post">
    @csrf
    <img class="mb-4 " src="{{ asset('assets/images/lotus.png') }}"
      alt="logo" width="72" height="72">
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div class="form-floating mt-2 mb-2 ">
      <input type="text" id="name" name="name"
        class="form-control rounded-2 @error('name')is-invalid @enderror"
        value="{{ old('name') }}" placeholder="Name">
      <label for="name">Name</label>
      @error('name')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-floating  mb-2">
      <input type="email" id="email" name="email"
        class="form-control rounded-2 @error('email')is-invalid @enderror"
        value="{{ old('email') }}" placeholder="name@example.com">
      <label for="email">Email address</label>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-floating mb-2">
      <input type="password" id="password" name="password"
        class="form-control rounded-2 @error('password')is-invalid @enderror"
        value="{{ old('password') }}" placeholder="Password">
      <label for="password">Password</label>
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-4">
        <input class="form-check-input" type="radio" name="gender" id="gender1"
          value="0">
        <label class="form-check-label" for="gender1"
          {{ request('gender') == 0 ? 'checked' : '' }}>
          Female
        </label>
      </div>
      <div class="col-4">
        <input class="form-check-input" type="radio" name="gender" id="gender2"
          value="1" {{ request('gender') == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="gender2">
          Male
        </label>

      </div>
      @error('gender')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>


    <p class="mt-2 mb-2 text-muted">Already registered? <a href="/login"
        class="text-info">please login</a> </p>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-2 mb-2 text-muted">&copy; 2022</p>
  </form>
@endsection
