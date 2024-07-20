<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run() : void
    {
       if(!User::where("email","caio@example.com")->exists()) {
        User::create([
            'name' => 'Caio',
            'email' => 'caio@example.com',
            'password' => Hash::make('caio123')
        ]);
    }
    }
}