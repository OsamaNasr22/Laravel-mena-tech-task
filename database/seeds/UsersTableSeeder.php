<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin= new User();
        $admin->name= "Admin";
        $admin->email="admin@admin.com";
        $admin->password= Hash::make("password");
        $admin->remember_token= Str::random(10);
        $admin->save();
     }
}
