<?php

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
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
   //data barang
   Route::resource('item', "itemC");
   Route::get("keluar", "itemC@keluar");
   Route::post('stok/{iditem}/ubah', "itemC@ubahstok")->name("ubah.stok");
   
   //barang habis
   Route::get("habis", "itemhabisC@index");
   Route::get("habis/cetak", "itemhabisC@cetak")->name("cetak.habis");
   
   //EXPIRED
   Route::get("expired", "itemexpiredC@index");
   Route::get("expired/cetak", "itemexpiredC@cetak")->name("cetak.expired");
    
});


// Route::get('pdf', 'startController@pdf');


Auth::routes();


