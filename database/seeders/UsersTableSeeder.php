<?php

namespace Database\Seeders;

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
        $a = new User;
        $a->name = 'Admin';
        $a->email = 'admin@admin.com';
        $a->password = Hash::make('password');
        $a->is_admin = true;
        $a->save();
    }
}
