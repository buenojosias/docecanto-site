<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->select(['id','title','local','date'])
            ->whereDate('date', '>=', date('Y-m-d'))
            ->orderBy('date', 'asc')
            ->get();

        return response()->json(['data' => $events]);
    }

    public function show(Event $event)
    {
        $songs = null;
        $user = Auth::user();
        $member = $user->member;
        $answer = $event->members()->where('member_id', $member->id)->first();
        $event->answer = $answer->pivot->answer ?? null;

        return response()->json([
            'data' => $event,
        ]);
    }

    public function syncAnswer(Request $request)
    {
        $member = Auth::user()->member;
        $event = $request->event['data']['id'];
        $answer = $request->answer;
        if($member->events()->syncWithoutDetaching([$event => ['answer' => $answer]]))
            return response()->json(['success' => true]);

        return response()->json(['success' => false]);
    }

    # músicas
}
