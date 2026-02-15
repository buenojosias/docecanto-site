<?php

use App\Livewire\Category\{ CategoryIndex };
use App\Livewire\Dashboard\DashboardIndex;
use App\Livewire\Encounter\{ EncounterIndex, EncounterShow, EncounterForm };
use App\Livewire\Event\{ EventIndex, EventShow, EventForm };
use App\Livewire\Financial\FinancialIndex;
use App\Livewire\Financial\MensalityIndex;
use App\Livewire\Financial\TransactionIndex;
use App\Livewire\Member\{ MemberIndex, MemberShow, MemberForm };
use App\Livewire\Rating\{ RatingIndex };
use App\Livewire\Queue\{ QueueIndex, QueueShow, QueueForm };
use App\Livewire\Song\{ SongIndex, SongShow, SongForm };
use App\Http\Controllers\AudioController;
use App\Http\Controllers\ProfileController;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardIndex::class)->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::prefix('categorias')->name('categories.')->group(function () {
    Route::get('/', CategoryIndex::class)->name('index');
});

Route::prefix('ensaios')->name('encounters.')->group(function () {
    Route::get('/cadastro', EncounterForm::class)->name('create');
    Route::get('/{encounter}/ver', EncounterShow::class)->name('show');
    Route::get('/{encounter}/editar', EncounterForm::class)->name('edit')->middleware('coordinator');
    Route::get('/{period?}', EncounterIndex::class)->name('index');
});

Route::prefix('eventos')->name('events.')->group(function () {
    Route::get('/', EventIndex::class)->name('index');
    Route::get('/cadastro', EventForm::class)->name('create')->middleware('coordinator');
    Route::get('/{event}', EventShow::class)->name('show');
    Route::get('/{event}/editar', EventForm::class)->name('edit')->middleware('coordinator');
});

Route::prefix('integrantes')->name('members.')->group(function () {
    Route::get('/', MemberIndex::class)->name('index');
    Route::get('/cadastro', MemberForm::class)->name('create');
    Route::get('/{member}', MemberShow::class)->name('show');
    Route::get('/{member}/editar', MemberForm::class)->name('edit');
});

Route::prefix('usuarios')->name('users.')->group(function () {
    Route::get('/', UserIndex::class)->name('index');
    // Route::get('/cadastro', MemberUsers::class)->name('create');
    // Route::get('/{user}', UserIndex::class)->name('show');
    // Route::get('/{user}/editar', UserIndex::class)->name('edit');
});

Route::prefix('fichas-tecnicas')->name('ratings.')->group(function () {
    Route::get('/', RatingIndex::class)->name('index');
});

Route::prefix('musicas')->name('songs.')->group(function () {
    Route::get('/', SongIndex::class)->name('index');
    Route::get('/cadastro', SongForm::class)->name('create')->middleware('coordinator');
    Route::get('/{number}', SongShow::class)->name('show');
    Route::get('/{number}/editar', SongForm::class)->name('edit')->middleware('coordinator');
});

Route::prefix('audios')->name('audios.')->group(function () {
    // Route::get('/', [AudioController::class, 'index'])->name('index');
    Route::get('/{filename}', [AudioController::class, 'show'])->name('show');
    // Route::get('/create', [AudioController::class, 'create'])->name('create');
    // Route::post('/store', [AudioController::class, 'store'])->name('store');
});

Route::prefix('fila')->name('queues.')->group(function () {
    Route::get('/', QueueIndex::class)->name('index');
    Route::get('/cadastro', QueueForm::class)->name('create');
    Route::get('/{queue}', QueueShow::class)->name('show');
    Route::get('/{queue}/editar', QueueForm::class)->name('edit');
});

Route::prefix('financeiro')->name('financial.')->group(function () {
    Route::get('/', FinancialIndex::class)->name('index');
    Route::get('/mensalidades', MensalityIndex::class)->name('mensalities.index');
    Route::get('/transacoes', TransactionIndex::class)->name('transactions.index');
});
