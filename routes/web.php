<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';
