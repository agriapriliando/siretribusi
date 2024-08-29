<?php

use App\Livewire\ItemCreate;
use App\Livewire\ItemList;
use App\Livewire\ItemUpdate;
use App\Livewire\RentalCreate;
use App\Livewire\RentalList;
use App\Livewire\TenantCreate;
use App\Livewire\TenantList;
use App\Livewire\TenantUpdate;
use App\Livewire\UploadBukti;
use App\Livewire\UploadList;
use App\Livewire\UploadSuccess;
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

Route::get('item/list', ItemList::class);
Route::get('item/create', ItemCreate::class);
Route::get('item/{item}', ItemUpdate::class);

Route::get('/', TenantList::class);
Route::get('tenant/list', TenantList::class);
Route::get('tenant/create', TenantCreate::class);
Route::get('tenant/{tenant}', TenantUpdate::class);

Route::get('rental/list', RentalList::class);
// Route::get('rental', RentalList::class);
Route::get('rental/create', RentalCreate::class);


Route::get('upload/{id}/{user_id}', UploadBukti::class);
// 02876008-91c4-4ebb-9e7b-9f0de2deb4e9/1
Route::get('upload/success', UploadSuccess::class);
Route::get('upload/list', UploadList::class);
