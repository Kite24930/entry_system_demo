<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@test.com';
        $user->belong_to = '株式会社 KANRI システム部 第24管理課';
        $user->post = '課長';
        $user->password = bcrypt('password');
        $user->save();
    }
}
