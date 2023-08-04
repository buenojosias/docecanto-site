<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

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
        $user = \Auth::user();
        $member = $user->member;
        if($member) {
            $answer = $event->members()->where('member_id', $member->id)->first();
            $event->answer = $answer->pivot->answer ?? null;
            $event->is_member = true;
        }
        if($event->time) {
            $event->time = \Carbon\Carbon::parse($event->time)->format('H\hi');
        }

        return response()->json([
            'data' => $event,
        ]);
    }

    public function songs(Event $event) {
        $songs = $event->songs;

        return response()->json($songs);
    }

    public function syncAnswer(Request $request)
    {
        $member = \Auth::user()->member;
        // $event = $request->event['data']['id'];
        $answer = $request->answer;
        if($member->events()->syncWithoutDetaching([$request->eventId => ['answer' => $answer]]))
            return response()->json(['success' => true]);

        return response()->json(['success' => false]);
    }
}
