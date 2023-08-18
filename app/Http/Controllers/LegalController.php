<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug, $lang = 'pt')
    {
        $legal = Legal::query()->where('slug', $slug)->where('lang', $lang)->firstOrFail();
        return view('legal.index', [
            'legal' => $legal
        ]);
    }
}
