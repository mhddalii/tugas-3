@extends('navbar')
@section('content')
<br>
<div class="container">
  <h2 class="text-center">Edit Berita</h2>
  <form action="{{route('post.update', $data->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Judul</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $data->title }}" >
    @error('title')
        <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ $data->content }}</textarea>
    @error('content')
      <div class="alert alert-danger my-3">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Gambar</label>
      <input class="form-control" type="file" id="formFile" name="image" value="{{ $data->image }}">
      @error('image')
        <div class="alert alert-danger my-3">{{$message}}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection