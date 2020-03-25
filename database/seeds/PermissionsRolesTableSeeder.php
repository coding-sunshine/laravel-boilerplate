<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $permissions = ([
            [
                'name' => 'auth.home',
                'description' => 'User Homepage'
            ],
            [
                'name' => 'auth.dashboard',
                'description' => 'User Dashboard'
            ],
            [
                'name' => 'admin.dashboard',
                'description' => 'Admin Dashboard'
            ],
            [
                'name' => 'superadmin.dashboard',
                'description' => 'Superadmin Dashboard'
            ],
        ]);
        $roles = ([
            [
                'name' => 'superadmin',
                'description' => 'Super Admin',
                'permissions' => [
                    'auth.home',
                    'auth.dashboard',
                    'admin.dashboard',
                    'superadmin.dashboard',
                ]
            ],
            [
                'name' => 'admin',
                'description' => 'Admin',
                'permissions' => [
                    'auth.home',
                    'auth.dashboard',
                    'admin.dashboard',
                ]
            ],
            [
                'name' => 'user',
                'description' => 'User',
                'permissions' => [
                    'auth.home',
                    'auth.dashboard',
                ]
            ],
        ]);
        foreach ($permissions as $permission){
            Permission::create($permission);
        }
        foreach ($roles as $role){
            $permissions = $role['permissions'];
            unset($role['permissions']);
            $newRole = Role::create($role);
            $newRole->syncPermissions($permissions);
        }
    }
}