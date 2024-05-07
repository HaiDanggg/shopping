<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;

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
            'admin_name' => 'baoadmin',
            'admin_email' => 'baoadmin@gmail.com',
            'admin_phone' => '0976856447',
            'admin_password' => md5('123456')
        ]);
        $author = Admin::create([
            'admin_name' => 'baoauthor',
            'admin_email' => 'baoauthor@gmail.com',
            'admin_phone' => '0976856447',
            'admin_password' => md5('123456')
        ]);
        $user = Admin::create([
            'admin_name' => 'baouser',
            'admin_email' => 'baouser@gmail.com',
            'admin_phone' => '0976856447',
            'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        factory(App\Models\Admin::class, 10)->create();
    }
}
