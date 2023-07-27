<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Request;

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

    public function listByCategory(Category $category)
    {
        $category->load('songs');

        return response()->json(['data' => $category]);
    }

    public function show($number)
    {
        $song = Song::query()
            ->where('number', $number)
            ->with('categories')
            ->firstOrFail();

        return response()->json(['data' => $song]);
    }
}
