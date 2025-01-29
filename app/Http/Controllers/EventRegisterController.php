<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventRegisterController extends Controller
{
    public function show() {
        return view('event.register.issue');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ], [
            'name.required' => 'イベント名を入力してください',
            'date.required' => '日付を入力してください',
            'location.required' => '場所を入力してください',
            'description.required' => '説明を入力してください',
            'start_time.required' => '開始時間を入力してください',
            'end_time.required' => '終了時間を入力してください',
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->save();
        return redirect()->route('event.list');
    }
}
