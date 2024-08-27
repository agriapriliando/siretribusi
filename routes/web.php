<?php

use App\Livewire\ItemCreate;
use App\Livewire\ItemList;
use App\Livewire\ItemUpdate;
use App\Livewire\RentalCreate;
use App\Livewire\RentalList;
use App\Livewire\TenantCreate;
use App\Livewire\TenantList;
use App\Livewire\TenantListv;
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

Route::get('item', ItemList::class);
Route::get('item/create', ItemCreate::class);
Route::get('item/{item}', ItemUpdate::class);

Route::get('tenant', TenantList::class);
Route::get('tenant/list', TenantListv::class);
Route::get('tenant/create', TenantCreate::class);

Route::get('/', RentalList::class);
Route::get('rental', RentalList::class);
Route::get('rental/create', RentalCreate::class);
Route::get('upload', UploadBukti::class);
Route::get('upload/list', UploadVal::class);
Route::get('upload/success', UploadSuccess::class);
