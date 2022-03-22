<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = [
            'name'           => 'Admin Admin',
            'email'          => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
        ];

        User::insert($user);
    }
}
