<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Event;
use Illuminate\Http\Request;

class EntryRegistrationController extends Controller
{
    public function show($event_id) {
        $event = Event::find($event_id);
        return view('entry.registration', compact('event'));
    }

    public function store(Request $request, $event_id) {
        $entry = new Entry();
        $entry->event_id = $event_id;
        $entry->user_id = auth()->id();
        $entry->save();
        $event = Event::find($event_id);
        $msg = $event->name . 'に参加登録しました';
        return redirect()->route('entry')->with('msg', $msg);
    }
}
