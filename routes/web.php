<?php

use App\Livewire\ItemCreate;
use App\Livewire\ItemList;
use App\Livewire\RentalCreate;
use App\Livewire\RentalList;
use App\Livewire\TenantCreate;
use App\Livewire\TenantList;
use App\Livewire\UploadBukti;
use App\Livewire\UploadSuccess;
use App\Livewire\UploadVal;
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

Route::get('/', RentalList::class);
Route::get('rental', RentalList::class);
Route::get('rental/create', RentalCreate::class);
Route::get('tenant', TenantList::class);
Route::get('tenant/create', TenantCreate::class);
Route::get('item', ItemList::class);
Route::get('item/create', ItemCreate::class);
Route::get('upload', UploadBukti::class);
Route::get('upload/list', UploadVal::class);
Route::get('upload/success', UploadSuccess::class);

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/objeksewa', function () {
//     return view('objeksewa.index');
// });
// Route::get('/objeksewa/create', function () {
//     return view('objeksewa.create');
// });
// Route::get('/bidang', function () {
//     return view('bidang.index');
// });
// Route::get('/bidang/create', function () {
//     return view('bidang.create');
// });
// Route::get('/penyewa', function () {
//     return view('penyewa.index');
// });
// Route::get('/penyewa/create', function () {
//     return view('penyewa.create');
// });
// Route::get('/rental', function () {
//     return view('rental.index');
// });
// Route::get('/rental/create', function () {
//     return view('rental.create');
// });
// Route::get('/upload', function () {
//     return view('upload');
// });
// Route::get('/success', function () {
//     return view('file.success');
// });
