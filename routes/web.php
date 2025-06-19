<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return ('ini halaman about');
});

Route::get('profile', function () {
    return view('profile');
});


Route::get('produk/{namaProduk}', function ($a) {
    return 'Saya Membeli <b>' . $a . '</b>';
});

Route::get('beli/{barang}/{jumlah}', function ($a, $b) {
    return view('beli', compact('a', 'b'));
});

Route::get('produk/{namaKategori?}', function ($nama = null) {
    if ($nama) {
        return 'Anda Memilih Kategori:' . $nama;
    } else {
        return 'Anda Belum Memilih Kategori!';
    }
        
});

Route::get('barang/{barang?}/{kode?}', function ($barang = null, $kode = null) {
    return view('barang', compact('barang', 'kode'));
});

use App\Http\Controllers\MyController;
Route::get('siswa', [MyController::class,'index']);
Route::get('siswa/create', [MyController::class,'create']);
Route::post('/siswa', [MyController::class, 'store']);
Route::get('siswa {id}', [MyController::class,'show']);
Route::get('siswa/{id}/edit', [MyController::class,'edit']);
Route::put('siswa/{id}', [MyController::class,'update']);
Route::delete('siswa/{id}', [MyController::class,'destroy']);
   

