<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyMessage;
use App\Models\Event;
use App\Models\Member;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $message = DailyMessage::query()->where('day', date('d'))->where('month', date('m'))->first();
        $birthday = Member::query()->whereMonth('birth', date('m'))->whereDay('birth', date('d'))->first();
        $event = Event::query()->whereDate('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->first();
        $songs = Song::query()->where('detached', true)->get();

        if ($birthday) {
            $birthday->short_name = strstr($birthday->name, ' ', true);
        }

        if ($event) {
            if (Carbon::parse($event->date)->format('Y-m-d') == Carbon::parse(now())->format('Y-m-d')) {
                $event->nearby = 'Hoje';
            } else if (Carbon::parse($event->date)->format('Y-m-d') == Carbon::parse(now()->addDay())->format('Y-m-d')) {
                $event->nearby = 'Amanhã';
            }
        }


        return response()->json([
            'message' => $message->message,
            'birthday' => $birthday,
            'event' => $event,
            'songs' => $songs,
        ]);
    }
    # Usuário antenticado
    # Versão atual do aplicativo
    # Aniversariantes do mês
}
