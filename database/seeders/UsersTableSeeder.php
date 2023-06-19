<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'Jayce Tabobo', 
            'email' => 'jaycetabobo@gmail.com',
            'password' => Hash::make('jayce1245')
        ]
        
    );
    }
}
