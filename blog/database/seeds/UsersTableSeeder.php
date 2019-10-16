<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole = Role::where('name','admin')->first();
        $superadminRole = Role::where('name','superadmin')->first();
        $userRole = Role::where('name','user')->first();
        $groupmanagerRole = Role::where('name','groupmanager')->first();


        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin')
        ]);

        $superadmin = User::create([
            'name'=>'SuperAdmin',
            'email'=>'admin@test.com',
            'password'=>bcrypt('password')
        ]);
        $user = User::create([
            'name'=>'User',
            'email'=>'user@test.com',
            'password'=>bcrypt('user')
        ]);
        $groupmanager = User::create([
            'name'=>'GroupManager',
            'email'=>'groupmanager@test.com',
            'password'=>bcrypt('groupmanager')
        ]);
        $admin->roles()->attach($adminRole);
        $superadmin->roles()->attach($superadminRole);
        $user->roles()->attach($userRole);
        $groupmanager->roles()->attach($groupmanagerRole);

        //
    }
}
