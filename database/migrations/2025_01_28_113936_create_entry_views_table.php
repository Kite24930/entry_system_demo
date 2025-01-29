<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('create or replace view entry_views as select x.id as entry_id, x.event_id as event_id, y.name as event_name, y.date as event_date, y.location as event_location, y.start_time as event_start_time, y.end_time as event_end_time, y.description as event_description, x.user_id as user_id, z.name as user_name, z.email as user_email, z.belong_to as user_belong_to, z.post as user_post, x.is_entry as is_entry, x.at_entry as at_entry, x.created_at as created_at, x.updated_at as updated_at from entries as x left join events as y on x.event_id = y.id left join users as z on x.user_id = z.id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_views');
    }
};
