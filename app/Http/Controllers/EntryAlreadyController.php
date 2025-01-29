<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EntryAlreadyController extends Controller
{
    public function show($event_id) {
        $event = Event::find($event_id);
        return view('entry.already', compact('event'));
    }
}
