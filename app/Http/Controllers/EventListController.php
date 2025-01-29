<?php

namespace App\Http\Controllers;

use App\Models\EntryView;
use App\Models\Event;
use Illuminate\Http\Request;

class EventListController extends Controller
{
    public function show() {
        $events = Event::all();
        return view('event.list.show', compact('events'));
    }

    public function detail($event_id) {
        $event = Event::find($event_id);
        $admitted = EntryView::where('event_id', $event_id)->where('is_entry', true)->get();
        $not_admitted = EntryView::where('event_id', $event_id)->where('is_entry', false)->get();
        $entry_num = EntryView::where('event_id', $event_id)->count();
        $admitted_num = EntryView::where('event_id', $event_id)->where('is_entry', true)->count();
        $not_admitted_num = EntryView::where('event_id', $event_id)->where('is_entry', false)->count();
        return view('event.list.detail', compact('event', 'admitted', 'not_admitted', 'entry_num', 'admitted_num', 'not_admitted_num'));
    }
}
