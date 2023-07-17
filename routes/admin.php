<?php

use App\Http\Admin\Category\{ CategoryIndex };
use App\Http\Admin\Encounter\{ EncounterIndex, EncounterShow, EncounterForm };
use App\Http\Admin\Event\{ EventIndex, EventShow, EventForm };
use App\Http\Admin\Member\{ MemberIndex, MemberShow, MemberForm, MemberUsers };
use App\Http\Admin\Rating\{ RatingIndex };
use App\Http\Admin\Queue\{ QueueIndex, QueueShow, QueueForm };
use App\Http\Admin\Song\{ SongIndex, SongShow, SongForm };
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['admin', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::prefix('categorias')->name('categories.')->group(function () {
    Route::get('/', CategoryIndex::class)->name('index');
});

Route::prefix('ensaios')->name('encounters.')->group(function () {
    Route::get('/cadastro', EncounterForm::class)->name('create');
    Route::get('/{encounter}/ver', EncounterShow::class)->name('show');
    Route::get('/{encounter}/editar', EncounterForm::class)->name('edit');
    Route::get('/{period?}', EncounterIndex::class)->name('index');
});

Route::prefix('eventos')->name('events.')->group(function () {
    Route::get('/', EventIndex::class)->name('index');
    Route::get('/cadastro', EventForm::class)->name('create');
    Route::get('/{event}', EventShow::class)->name('show');
    Route::get('/{event}/editar', EventForm::class)->name('edit');
});

Route::prefix('integrantes')->name('members.')->group(function () {
    Route::get('/', MemberIndex::class)->name('index');
    Route::get('/cadastro', MemberForm::class)->name('create');
    Route::get('/usuarios', MemberUsers::class)->name('users');
    Route::get('/{member}', MemberShow::class)->name('show');
    Route::get('/{member}/editar', MemberForm::class)->name('edit');
});

Route::prefix('fichas-tecnicas')->name('ratings.')->group(function () {
    Route::get('/', RatingIndex::class)->name('index');
});

Route::prefix('musicas')->name('songs.')->group(function () {
    Route::get('/', SongIndex::class)->name('index');
    Route::get('/cadastro', SongForm::class)->name('create');
    Route::get('/{number}', SongShow::class)->name('show');
    Route::get('/{number}/editar', SongForm::class)->name('edit');
});

Route::prefix('midias')->name('media.')->group(function () {
    Route::get('/{media}', [MediaController::class, 'show'])->name('show');
    // Route::get('/', [MediaController::class, 'index'])->name('index');
    // Route::get('/create', [MediaController::class, 'create'])->name('create');
    // Route::post('/store', [MediaController::class, 'store'])->name('store');
});

Route::prefix('fila')->name('queues.')->group(function () {
    Route::get('/', QueueIndex::class)->name('index');
    Route::get('/cadastro', QueueForm::class)->name('create');
    Route::get('/{queue}', QueueShow::class)->name('show');
    Route::get('/{queue}/editar', QueueForm::class)->name('edit');
});
