<?php

use App\Livewire\Auth\Login;
use App\Livewire\ItemCreate;
use App\Livewire\ItemList;
use App\Livewire\ItemUpdate;
use App\Livewire\RentalCreate;
use App\Livewire\RentalList;
use App\Livewire\RentalUpdate;
use App\Livewire\TenantCreate;
use App\Livewire\TenantList;
use App\Livewire\TenantUpdate;
use App\Livewire\UploadBukti;
use App\Livewire\UploadList;
use App\Livewire\UploadSuccess;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', Login::class)->name('login');

Route::get('logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    session()->flash('message', 'Anda Telah Logout');
    return redirect('/');
});

Route::get('user/list', UserList::class);

Route::middleware(['auth'])->group(function () {
    Route::get('item/list', ItemList::class);
    Route::get('item/create', ItemCreate::class);
    Route::get('item/{item}', ItemUpdate::class);

    Route::get('tenant/list', TenantList::class);
    Route::get('tenant/create', TenantCreate::class);
    Route::get('tenant/{tenant}', TenantUpdate::class);

    Route::get('rental/list', RentalList::class);
    Route::get('rental/create', RentalCreate::class);
    Route::get('rental/{rental}', RentalUpdate::class);

    Route::get('/', UploadList::class);
    Route::get('upload/list', UploadList::class);
    Route::get('upload/{id}/{user_id}', UploadBukti::class);
    Route::get('upload/success', UploadSuccess::class);
});
