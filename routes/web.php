<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'ini laravel saya';
});

route::get('angka/{angka}', function ($angka){
    return 'Angka : ' . $angka;
});

route::get('penjumlahan/{angka1}/{angka2}', function ($angka1, $angka2){
    return 'Hasil Penjumlahan : ' . $angka1 + $angka2;
});

Route::match(['get', 'post'], '/data', function () {
    return 'Match';
});

Route::any('/data2', function () {
    return 'Any';
});

Route::get('dependency', function (Request $request) {
    return $request;
});

Route::get('coba', function () {
    return view ('coba');
});

Route::get('template', function () {
    return view ('template');
});

Route::get('table', function () {
    $data = ['meja', 'kursi', 'lampu', 'pensil'];

    return view ('table', compact('data'));
});

Route::get('navbar', function () {
    return view ('navbar');
});

Route::get('footer', function () {
    return view ('footer');
});

Route::get('index', function () {
    return view ('index');
});

Route::get('login', function () {
    return view ('login');
});

Route::get('register', function () {
    return view ('register');
});

// Route::get('post', [PostController::class, 'index'] );
// Route::get('tambahpost', [PostController::class, 'create'] );
Route::resource('post', PostController::class);

// Route::get('comment', [CommentController::class, 'index'] );
Route::resource('comment', CommentController::class);

// Route::get('user', [UserController::class, 'index'] );
Route::resource('user', UserController::class);