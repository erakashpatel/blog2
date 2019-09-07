<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_admin = Role::where('name', 'Admin')->first();
	    $role_manager  = Role::where('name', 'Manager')->first();
	    $role_normal = Role::where('name', 'Normal')->first();

	    $admin = new User();
	    $admin->name = 'Admin';
	    $admin->email = 'admin@example.com';
	    $admin->password = bcrypt('123123123');
	    $admin->save();
	    $admin->roles()->attach($role_admin);

	    $manager = new User();
	    $manager->name = 'Manager';
	    $manager->email = 'manager@example.com';
	    $manager->password = bcrypt('123123123');
	    $manager->save();
	    $manager->roles()->attach($role_manager);

	    $normal = new User();
	    $normal->name = 'Employee';
	    $normal->email = 'employee@example.com';
	    $normal->password = bcrypt('123123123');
	    $normal->save();
	    $normal->roles()->attach($role_normal);
    }
}
