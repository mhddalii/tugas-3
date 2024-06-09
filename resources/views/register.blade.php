@extends('navbar')
@section('content')
<br>
<form class="container">
  <h2 class="text-center">Register Form</h2>
  <div class="mb-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
<br>
@endsection