<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriController,
    ProdukController,
    UserController,
    SupplierController,
    BarangMasukController,
    BarangKeluarController,
    LaporanController,
    LaporanKeluarController,
};
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
        Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::resource('/kategori', KategoriController::class);

        Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
        Route::post('/produk/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
        Route::resource('/produk', ProdukController::class);

        Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
        Route::resource('/supplier', SupplierController::class);

        Route::get('/barangmasuk/data',[BarangMasukController::class, 'data'])->name('barangmasuk.data');
        Route::resource('/barangmasuk', BarangMasukController::class);

        Route::get('/barangkeluar/data',[BarangKeluarController::class, 'data'])->name('barangkeluar.data');
        Route::resource('/barangkeluar', BarangKeluarController::class);
        
        Route::get('/laporanmasuk', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporanmasuk/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
        Route::get('laporanmasuk/export/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');

        Route::get('/laporankeluar', [LaporanKeluarController::class, 'index'])->name('laporankeluar.index');
        Route::get('/laporankeluar/data/{awal}/{akhir}', [LaporanKeluarController::class, 'data'])->name('laporankeluar.data');
        Route::get('laporankeluar/export/pdf/{awal}/{akhir}', [LaporanKeluarController::class, 'exportPdf'])->name('laporankeluar.export.pdf');


        Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
        Route::resource('/user', UserController::class);

        Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::post('/profil', [UserController::class, 'updateProfil'])->name('user.update_profil');


});
