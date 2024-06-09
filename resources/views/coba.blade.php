@extends('template')
@section('main')
<h1>ini halaman coba</h1>

<?php for ($i=1; $i<=10; $i++){
  echo "<h2>ini perulangan</h2>";
}?>

@for ($i=1; $i<=10; $i++)
  @if ($i % 2)
  <h2>ini perulangan menggunakan blade</h2>
  @endif
@endfor

<img src="{{ asset('Muhammad Ali.jpg')}}" width="400px" alt="">
<img src="{{ asset('img/Ice age - Copy.png')}}" width="400px" alt="">

@endsection
