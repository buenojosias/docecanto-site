<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Legal;

class LegalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug, $lang = 'pt')
    {
        $legal = Legal::query()->where('slug', $slug)->where('lang', $lang)->firstOrFail();
        return response()->json($legal);
    }
}
