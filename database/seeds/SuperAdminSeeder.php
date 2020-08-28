<?php

use App\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new User();        
        $superAdmin->name = 'super-admin';
        $superAdmin->email = 'admin@system.com';
        $superAdmin->password = bcrypt('admin@123');
        $superAdmin->role_id = 1;
        $superAdmin->school_id = 0;
        $superAdmin->save();
    }
}
