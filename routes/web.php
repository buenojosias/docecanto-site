<?php

use App\Http\Controllers\LegalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/legal/{slug}/{lang?}', LegalController::class);

// REMOVER APÓS APROVAÇÃO DO APP
Route::get('privacidade', function () {
    return view('app.policy');
});
Route::get('termos', function () {
    return view('app.therms');
});
//

Route::prefix('admin')->middleware('admin')->group(function () {
    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';
