<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->withCount('songs')
            ->get();

        $songs = Song::query()
            ->select(['id','number','title','resume','detached'])
            ->where('detached', true)
            ->orderBy('number')
            ->get();

        return response()->json(['data' => [
            'categories' => $categories,
            'songs' => $songs
        ]]);
    }

    public function search(Request $request) {
        $query = \Str::slug($request['query'], ' ');
        $songs = Song::query()
            ->select(['id','number','title','resume'])
            ->where('fulltext', 'like', '%'.$query.'%')
            ->get();
        return response()->json($songs);
    }

    public function listByCategory(Category $category)
    {
        $category->load('songs');

        return response()->json(['data' => $category]);
    }

    public function listFavorite()
    {
        $user = \Auth::user();
        $songs = $user->favorites;

        return response()->json($songs);
    }

    public function show($number)
    {
        $user = \Auth::user();
        $song = Song::query()
            ->where('number', $number)
            ->with('categories')
            ->firstOrFail();
        $song->audio = $song->vocal;
        $song->isFavorite = $song->favorites()->where('user_id', $user->id)->exists();

        return response()->json(['data' => $song]);
    }

    public function audio($filename)
    {
        $audio = Audio::where('filename', $filename)->firstOrFail();
        $path = $audio->path;
        return Storage::response($path);
    }

    public function syncFavorite(Request $request)
    {
        $user = \Auth::user();
        if($request->action === 'attach') {
            if($user->favorites()->syncWithoutDetaching($request->songId))
                return response()->json(['success' => true]);
        } else if($request->action === 'detach') {
            if($user->favorites()->detach($request->songId))
                return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
