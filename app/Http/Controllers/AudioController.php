<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function index()
    {
        $files = Storage::allFiles();
        dd($files);
    }

    public function show($filename)
    {
        $audio = Audio::where('filename', $filename)->firstOrFail();
        $path = $audio->path;
        return Storage::response($path);
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:2048'
        ]);
        // Para funcionar, precisei abrir o arquivo php.ini e editar a seguinte linha:
        // upload_tmp_dir = "C:/Laragon/tmp"

        // if($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = $file->getClientOriginalName();
        //     dd($request->image->storeAs('images', $filename, 's3'));
        // }
    }
}
