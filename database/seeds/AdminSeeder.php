<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->age = 30;
        $user->email = 'admin@user.com';
        $user->password = Hash::make('123');
        $user->role = 'admin';
        $user->save();


    }
}
