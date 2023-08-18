<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BirthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LegalController;
use App\Http\Controllers\Api\SongController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{event}', [EventController::class, 'show']);
    Route::get('/events/{event}/songs', [EventController::class, 'songs']);
    Route::post('/events/sync-answer', [EventController::class, 'syncAnswer']);

    Route::get('/songs', [SongController::class, 'index']);
    Route::get('/songs/category/{category}', [SongController::class, 'listByCategory']);
    Route::get('/songs/favorite', [SongController::class, 'listFavorite']);
    Route::post('/songs/favorite', [SongController::class, 'syncFavorite']);
    Route::post('/songs/search', [SongController::class, 'search']);
    Route::get('/songs/{number}', [SongController::class, 'show']);

    Route::get('/births/{period}', BirthController::class);

    Route::post('/auth/password', [AuthController::class, 'changePassword']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/audio/{filename}', [SongController::class, 'audio']);
Route::get('/legal/{slug}/{lang?}', LegalController::class);

Route::get('kins', function(Request $request){
    return \App\Models\Kin::query()
        ->select('id','name')
        ->orderBy('name','asc')
        ->when(
            $request->search,
            fn (Builder $query) => $query
                ->where('name', 'like', "%{$request->search}%")
        )
        ->when(
            $request->exists('selected'),
            fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            fn (Builder $query) => $query->limit(10)
        )
        ->get();
})->name('api.kins');
