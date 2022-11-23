@extends('layouts.master')

@section('content')
<div class="container w-75 p-3 text-dark">
<form action="/register" method="post">
{{ csrf_field() }}

  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Username</label>
    <input type="text" name="name" placeholder="Username" id="form2Example1" class="form-control" />
  </div>
  
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Email Address</label>
    <input type="email" name="email" placeholder="Email"id="form2Example1" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example2">Password</label>
    <input type="password" name="password" placeholder="Password" id="form2Example2" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example2">Confirm Password</label>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" id="form2Example2" class="form-control" />
  </div>

  <!-- Submit button -->
  <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-dark btn-block mb-4" name="register" value="Register" />
  </div>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Is a member? <a href="/login" class="text-info" style="text-decoration: none;">Login</a></p>
  </div>
</form>
</div>

@endsection
    