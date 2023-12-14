<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TransaksiContoller;
use App\Http\Controllers\UsersContoller;
use App\Models\Menu;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimoni = Testimoni::take(3)->inRandomOrder()->get();
    return view('welcome', compact('testimoni'));
});

Route::get('/testimoni', function () {
    return view('testimonial');
});

Route::get('/keluhan', function () {
    return view('keluhan');
});

Route::get('/menu', function () {
    // $makanan = Menu::where('kategori', 'Makanan')->get();
    // $minuman = Menu::where('kategori', 'Minuman')->get();
    $product = Menu::all();
    return view('Menu', compact('product'));
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');

Route::resource('admin/menu', MenuController::class)->middleware('admin');
Route::resource('admin/promo', PromoController::class)->middleware('admin');
Route::resource('admin/user', UsersContoller::class)->middleware('admin');
Route::resource('admin/keluhan', KeluhanController::class)->middleware('admin');
Route::resource('admin/testimoni', TestimoniController::class)->middleware('admin');
Route::resource('admin/transaksi', TransaksiContoller::class)->middleware('admin');
Route::resource('admin/customer', UsersContoller::class)->middleware('admin');

Route::post('testimoni', [TestimoniController::class, 'store'])->name('testiomoni.store');
Route::post('keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');

Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store'])->name('store.product');

Route::get('admin/testimoni', [TestimoniController::class, 'index']);
Route::get('admin/customer', [CustomerController::class, 'index'])->middleware('admin');
Route::get('admin/customer/data/{id}', [CustomerController::class, 'show'])->middleware('admin');
Route::get('admin/laporan', [LaporanController::class, 'index'])->middleware('admin');
Route::get('admin/laporan/export', [LaporanController::class, 'export'])->name('laporan.export')->middleware('admin');
Route::get('admin/laporan/exportPDF', [LaporanController::class, 'exportPDF'])->name('laporan.exportPDF');
Route::get('admin/laporan/exportPDFTestimoni', [LaporanController::class, 'exportPDFTestimoni'])->name('laporan.exportPDFTestimoni');
Route::get('admin/laporan/exportPDFKeluhan', [LaporanController::class, 'exportPDFKeluhan'])->name('laporan.exportPDFKeluhan');
Route::get('admin/laporan/exportPDFCustomer', [LaporanController::class, 'exportPDFCustomer'])->name('laporan.exportPDFCustomer');

Route::resource('cart', CartController::class)->middleware('auth');
// Laporan

Route::get('admin/laporan/keluhan', [KeluhanController::class, 'index']);
Route::get('admin/laporan/testimoni', [TestimoniController::class, 'index']);
Route::get('admin/laporan', [LaporanController::class, 'index'])->middleware('admin');
Route::get('admin/laporan/customer', [CustomerController::class, 'index'])->middleware('admin');


// Route::get('admin/transaksi/export-csv', [LaporanController::class, 'exportCsv'])->name('laporan.exportCsv');


