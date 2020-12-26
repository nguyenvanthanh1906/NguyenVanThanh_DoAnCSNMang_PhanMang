<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User;
        $admin->name='admin';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('admin123');
        $admin->visible_password='admin123';
        $admin->email_verified_at=NOW();
        $admin->occupation='admin';
        $admin->address='VN';
        $admin->phone='0522812101';
        $admin->is_admin=1;
        $admin->save();
    }
}
