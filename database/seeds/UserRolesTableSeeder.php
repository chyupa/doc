<?php
  use Illuminate\Database\Seeder;
  use Illuminate\Database\Eloquent\Model;
  use Doc\Role;

  class UserRolesTableSeeder extends Seeder {

    public function run()
    {
      DB::table('user_roles')->delete();

      Role::create(['name'=>'admin']);
      Role::create(['name'=>'user']);
    }

  }