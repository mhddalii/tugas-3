@extends('navbar')
@section('content')
<br>
<div class="container">
  <table class="table container">
    <h2 class="text-center card card-body">Data Komentar</h2>
    <a href="{{ route('comment.create') }}" class="btn btn-primary my-3">Tambah Data</a>
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Komentar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->content}}</td>
        <td><a href="{{route('comment.edit', $item->id)}}"><button class="btn btn-success">Edit</button></a></td>
          <td>
            <form action="{{route('comment.destroy', $item->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
@endsection