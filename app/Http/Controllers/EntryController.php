<?php

namespace App\Http\Controllers;

use App\Models\EntryView;
use App\Models\Event;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function show() {
        $applied = EntryView::where('user_id', auth()->id())->pluck('event_id')->toArray();
        $applied_events = Event::whereIn('id', $applied)->orderBy('date')->get();
        $not_applied_events = Event::whereNotIn('id', $applied)->orderBy('date')->get();
        return view('entry.show', compact('applied_events', 'not_applied_events'));
    }
}
