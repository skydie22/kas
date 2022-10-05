<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

        $role_admin = Role::findByName('admin');
        $role_bendahara = Role::findByName('bendahara');

        $admin->assignRole($role_admin);
        $bendahara->assignRole($role_bendahara);
    }
}
