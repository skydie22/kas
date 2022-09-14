<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@kas.com',
            'password' => bcrypt('password') 
        ]);

        $bendahara = User::create([
            'name' => 'bendahara',
            'email' => 'bendahara@kas.com',
            'password' => bcrypt('password') 
        ]);
    }
}
