<?php

use App\Http\Middleware\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/home', [CustomerController::class, 'home'])->name('cus.home');
    Route::post('/pesan', [OrderController::class, 'pesan'])->name('cus.pesan');
    Route::get('/keranjang', [CustomerController::class, 'keranjang'])->name('cus.keranjang');
    Route::get('/riwayat', [CustomerController::class, 'riwayat'])->name('cus.riwayat');
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('cus.checkout');
    Route::get('/checkoutcomplate', [CustomerController::class, 'checkoutcomplate'])->name('cus.checkoutcomplate');
    Route::delete('/keranjang/hapus/{orderdetail:id}', [CustomerController::class, 'hapusKeranjang'])->name('cus.hapusKeranjang');
    Route::get('/account', [CustomerController::class, 'account'])->name('cus.account');
    Route::get('/hapusakun/{user}', [CustomerController::class, 'hapusAkun'])->name('cus.hapusAkun');
    Route::get('/{user}/editAkun', [CustomerController::class, 'editAkun'])->name('cus.editAkun');
    Route::post('/{user}/editAkunAction', [CustomerController::class, 'editAkunAction'])->name('cus.editAkunAction');
});

//admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Route Dashbord
    Route::get('/admin/dashboard', [UserController::class, 'adminhome'])->name('admin.home');
    Route::get('/admin/updatestatus/{order:id}', [OrderController::class, 'setStatusSiap'])->name('admin.setStatusOrder');
    Route::post('/admin/updatebatasorder/{toko:id}', [OrderController::class, 'updateBatasOrder'])->name('admin.updateBatasOrder');
    // Route Fitur Menu
    Route::get('/admin/viewmenu', [MenuController::class, 'index'])->name('admin.ViewMenu');
    Route::get('/admin/tambah', [MenuController::class, 'create'])->name('admin.TambahMenu');
    Route::post('/admin/tambah', [MenuController::class, 'store'])->name('admin.actionTambahMenu');
    Route::delete('/admin/hapus/{menu:id}', [MenuController::class, 'destroy'])->name('admin.HapusMenu');
    Route::get('/admin/{menu:id}/edit', [MenuController::class, 'edit'])->name('admin.FormUpdate');
    Route::post('/admin/{menu:id}/edit', [MenuController::class, 'update'])->name('admin.ActionFormUpdate');

    //Route Fitur Toping
    Route::get('/admin/viewtoping', [MenuController::class, 'viewtoping'])->name('admin.ViewToping');
    Route::get('/admin/tambahtoping', [MenuController::class, 'tambahToping'])->name('admin.TambahToping');
    Route::post('/admin/tambahtoping', [MenuController::class, 'tambahTopingAction'])->name('admin.actionTambahToping');
    Route::delete('/admin/hapusToping/{toping:id}', [MenuController::class, 'hapusToping'])->name('admin.hapusToping');
    Route::get('/admin/{toping:id}/edittoping', [MenuController::class, 'editToping'])->name('admin.editToping');
    Route::post('/admin/{toping:id}/edittoping', [MenuController::class, 'editTopingAction'])->name('admin.actionEditToping');

    // Route Fitur Riwayat Pemesanan
    Route::get('/admin/orders', [OrderController::class, 'orders'])->name('admin.OrderMasuk');
    Route::get('/admin/riwayat', [OrderController::class, 'riwayat'])->name('admin.RiwayatOrder');
    Route::get('/admin/detail/{order:id}', [OrderDetailController::class, 'detailOrder'])->name('admin.DetailOrder');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/admin', [UserController::class, 'loginAdmin'])->name('admin.login');
    Route::post('/admin', [UserController::class, 'adminAction'])->name('admin.action');
    Route::get('/login', [CustomerController::class, 'login'])->name('cus.login');
    Route::post('/login', [CustomerController::class, 'storeLogin'])->name('cus.action');
    Route::get('/regis', [CustomerController::class, 'regis'])->name('cus.regis');
    Route::post('/regis', [CustomerController::class, 'storeRegis'])->name('cus.regisAction');
    Route::get('/', [MenuController::class, 'landingpage'])->name('landing.page');
});

Route::post('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::get('/logout', [CustomerController::class, 'logout'])->name('cus.logout');
