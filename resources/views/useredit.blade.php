@extends('navbar')
@section('content')
<br>
<div class="container">
  <h2 class="text-center">Edit User</h2>
  <form action="{{route('user.update', $data->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $data->name }}" >
    @error('name')
        <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput2" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleFormControlInput2" name="email" value="{{ $data->email }}" >
    @error('email')
        <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput3" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleFormControlInput3" name="password" value="{{ $data->password }}" >
    @error('password')
        <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection