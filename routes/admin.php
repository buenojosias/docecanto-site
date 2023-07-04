<?php

use App\Http\Admin\Member\{ MemberIndex, MemberShow, MemberForm };
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['admin', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::prefix('integrantes')->name('members.')->group(function () {
    Route::get('/', MemberIndex::class)->name('index');
    Route::get('/cadastro', MemberForm::class)->name('create');
    Route::get('/{member}', MemberShow::class)->name('show');
    Route::get('/{member}/editar', MemberForm::class)->name('edit');
});
