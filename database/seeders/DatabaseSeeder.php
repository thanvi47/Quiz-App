<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $admin = new User();
         $admin->name = 'admin';
            $admin->email = 'super@admin.com';
            $admin->password = bcrypt('superadmin');
            $admin->visible_password = 'password';
            $admin->email_verified_at = now();
            $admin->occupation = 'admin';
            $admin->address = 'home';
            $admin->phone = '123456789';
            $admin->is_admin = 1;
            $admin->save();


    }
}
