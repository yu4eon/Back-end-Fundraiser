<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('1234');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'Normie';
        $user->email = 'Normie@gmail.com';
        $user->password = Hash::make('9876');
        $user->role = 'user';
        $user->save();
    }
}
