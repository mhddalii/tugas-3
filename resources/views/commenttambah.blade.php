@extends('navbar')
@section('content')
<br>
<div class="container">
  <h2 class="text-center">Tambah Komentar</h2>
  <form action="{{route('comment.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name') }}" >
    @error('name')
        <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ old('content') }}</textarea>
    @error('content')
      <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection