<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new Role();
        $superAdmin->name = 'super-admin';
        $superAdmin->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->save();

        $teacher = new Role();
        $teacher->name = 'teacher';
        $teacher->save();

        $student = new Role();
        $student->name = 'student';
        $student->save();
    }
}
