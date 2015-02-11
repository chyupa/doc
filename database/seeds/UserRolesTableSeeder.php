<?php
  use Illuminate\Database\Seeder;
  use Illuminate\Database\Eloquent\Model;
  use Doc\UserRoles;

  class UserRolesTableSeeder extends Seeder {

    public function run()
    {
      DB::table('user_roles')->delete();

      UserRoles::create(['name'=>'admin']);
      UserRoles::create(['name'=>'user']);
    }

  }