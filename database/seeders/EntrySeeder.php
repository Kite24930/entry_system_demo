<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        foreach ($events as $event) {
            $registered_users = Entry::where('event_id', $event->id)->pluck('user_id')->toArray();
            $not_registered_users = User::whereNotIn('id', $registered_users)->limit(5)->get();
            foreach ($not_registered_users as $user) {
                Entry::factory()->withUser($user)->withEvent($event)->create();
            }
        }
    }
}
