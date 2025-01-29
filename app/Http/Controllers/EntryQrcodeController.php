<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\EntryView;
use App\Models\Event;
use Illuminate\Http\Request;

class EntryQrcodeController extends Controller
{
    public function show() {
        return view('entry.qrcode');
    }

    public function check(Request $request) {
        $event = Event::find($request->event_id);
        $entry = EntryView::where('event_id', $request->event_id)->where('user_id', $request->user_id)->first();
        $check = false;
        if ($entry) {
            $check = true;
        }
        return ['check' => $check, 'event' => $event, 'entry' => $entry];
    }

    public function store(Request $request) {
        $entry = Entry::where('event_id', $request->event_id)->where('user_id', $request->user_id)->first();
        $entry->is_entry = true;
        $entry->save();
        return redirect()->route('admission.already', ['event_id' => $request->event_id]);
    }
}
