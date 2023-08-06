<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('app/privacidade', function () {
    return view('app.policy');
});
Route::get('app/termos', function () {
    return view('app.therms');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';
