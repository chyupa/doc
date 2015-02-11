<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Doc\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('name'=>'Razvan Toader', 'role_id'=> 1 , 'username' => 'admin', 'password' => bcrypt('parola')));
    }

}