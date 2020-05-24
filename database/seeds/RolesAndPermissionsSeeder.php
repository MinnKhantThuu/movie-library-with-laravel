<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        $admin = Role::create(['name'=>'admin']);
        $manager = Role::create(['name'=>'manager']);
        $editor = Role::create(['name'=>'editor']);

        $user = User::whereId(1)->first();
        $user->assignRole('admin');
    }
}
