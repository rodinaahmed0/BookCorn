<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'manager']);
        $role = Role::create(['name' => 'admin']);


        foreach ( User::all()  as $user) {
               if ($user->cinema != null) {
                    $user->assignRole('manager');
               } else {
                    $user->assignRole('user');
               }

               if ($user->id == 1) {
                $user->assignRole('admin');
               }
        }
        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        // $role = Role::create(['name' => 'moderator'])
        //     ->givePermissionTo(['publish articles', 'unpublish articles']);

        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
    }
}
