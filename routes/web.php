<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/objeksewa', function () {
    return view('objeksewa.index');
});
Route::get('/objeksewa/create', function () {
    return view('objeksewa.create');
});
Route::get('/bidang', function () {
    return view('bidang.index');
});
Route::get('/bidang/create', function () {
    return view('bidang.create');
});
Route::get('/penyewa', function () {
    return view('penyewa.index');
});
Route::get('/penyewa/create', function () {
    return view('penyewa.create');
});
Route::get('/rental', function () {
    return view('rental.index');
});
Route::get('/rental/create', function () {
    return view('rental.create');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/success', function () {
    return view('file.success');
});
