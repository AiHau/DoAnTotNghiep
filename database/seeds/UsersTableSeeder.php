<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();
        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
			'admin_name' => 'aihau',
			'admin_email' => 'aihau@gmail.com',
			'admin_phone' => '0932023991',
			'admin_password' => md5('123456')	
        ]);
        $author = Admin::create([
			'admin_name' => 'truong',
			'admin_email' => 'truong@gmail.com',
			'admin_phone' => '0932023992',
			'admin_password' => md5('123456')	
        ]);
        $user = Admin::create([
			'admin_name' => 'ly',
			'admin_email' => 'ly@gmail.com',
			'admin_phone' => '0932023993',
			'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        factory(App\Admin::class,10)->create();
    }
}
