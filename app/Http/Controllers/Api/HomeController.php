<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Member;
use App\Models\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $birthday = Member::first();
        $event = Event::query()->whereDate('date', '>', date('Y-m-d'))->orderBy('date', 'asc')->first();
        $songs = Song::query()->where('detached', true)->get();

        return response()->json([
            'birthday' => $birthday,
            'event' => $event,
            'songs' => $songs,
        ]);
    }
    # Usuário antenticado
    # Versão atual do aplicativo
    # Aniversariantes do mês
    # Próximo evento
    # Músicas em destaque
}
