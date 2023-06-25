<?php

use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KelolaBarangController;
use App\Http\Controllers\updateUserController;
use App\Http\Controllers\TambahPesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LiveChatController;
use App\Http\Controllers\PaketMemberController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/account', function () {
    return view('account');
})->middleware('auth')->name('account');

// Route::get('/live-chat', function () {
//     return view('live-chat');
// })->middleware('auth');;

Route::get('/update-account', function () {
    return view('updateAccount');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/');
})->name('home');

Route::get('/contact-us', function () {
    return view('contactUs');
})->middleware('auth');

Route::get('/kelolaPaket', function () {
    return view('kelolaPaket');
});

Route::get('/paketDetail', function () {
    return view('paketDetail');
});

Route::get('/updatePaket', function () {
    return view('updatePaket');
});

// Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart');

Route::get('/kelolaPesanan', [App\Http\Controllers\PesananController::class, 'show'])->name('kelolaPesanan');

Route::get('/laporanTransaksi', [App\Http\Controllers\PesananController::class, 'showTransaksi'])->name('laporanTransaksi');

// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class])->name('register');

Route::get('/tambahPaket', function () {
    return view('tambahPaket');
});

Route::get('/paketMember', [PaketMemberController::class, 'index']);
Route::get('/paketMember/{paket_id}', [PaketMemberController::class, 'show']);


Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.destroy')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('kelolaBarang', KelolaBarangController::class);

Route::resource('/tambahPesanan', TambahPesananController::class);

// Route::get('/tambahPesanan', function () {
//     return view('tambahPesanan');
// });

Route::post('register', [RegisterController::class, 'register'])->name('register-otp');

Route::get('/laporanPaket/cetak_pdf', [PaketController::class, 'cetak_pdf'])->name('cetak_laporanPaket');

Route::resource('paket', PaketController::class);

Route::get('/otp', [OTPController::class, 'show'])->name('verification-get');
Route::post('/otp', [OTPController::class, 'verify'])->name('verification-post');

Route::get('/live-chat/{user_id}', [LiveChatController::class, 'index']);

Route::post('/cart/add',[KeranjangController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [KeranjangController::class,'showCart'])->name('cart.show');
Route::get('/test-cart', function (){
    return view('tes.product');
});

Route::get('/update-account', [updateUserController::class, 'edit'])->name('get-account');
Route::post('/post-account', [updateUserController::class, 'update'])->name('post-account');

//coba routes cart
Route::get('/tambahPesanan', [KeranjangController::class,'index'])->name('index');

Route::get('cart', [KeranjangController::class,'cart'])->name('cart');

Route::get('cartt', [KeranjangController::class,'cart'])->name('cartt');

Route::get('add-to-cart/{id}', [KeranjangController::class,'addToCart'])->name('addToCart');

Route::patch('update-cart', [KeranjangController::class,'update'])->name('update');

Route::delete('remove-from-cart', [KeranjangController::class,'remove'])->name('remove');

Route::resource('keranjang',PesananController::class);

Route::resource('laporan',LaporanController::class);
