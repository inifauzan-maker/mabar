<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dasbor')->name('dasbor');

foreach (config('modul') as $nama => $modul) {
    Route::view('/'.$nama, 'halaman-modul', ['modul' => $modul])->name($nama);
}
