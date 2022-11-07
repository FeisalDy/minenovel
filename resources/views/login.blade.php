@extends('layouts.master')

@section('content')
<div class="container w-50 p-3">
<form action="/login" method="POST">
{{ csrf_field() }}
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="username">Username</label>
    <input type="text" name="name" placeholder="Username" class="form-control" value="{{ (old('name')?old('name'):'') }}">
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="password">Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control" value="{{ old('password') }}">
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" name="remember" type="checkbox" value="1"/>
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col d-flex flex-row-reverse">
      <!-- Simple link -->
      <a href="#!" class="text-decoration-none">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <div class="d-flex justify-content-end">
  <input type="submit" class="btn btn-primary btn-block mb-4" name="login" value="Login" />
  </div>

  @include('partial.formerrors')

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="register" class="text-decoration-none">Register</a></p>
  </div>
</form>
</div>

@endsection
    