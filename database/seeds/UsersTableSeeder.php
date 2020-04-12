<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'superadmin' => [
                'name' => 'Superadmin',
                'email' => 'superadmin@example.com',
                'userName' => 'superadmin',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 'superadmin',
            ],
            'admin' => [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'userName' => 'admin',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ],
        ];
        foreach ($users as $user){
            $role = $user['role'];
            unset($user['role']);
            User::create($user)->assignRole($role);
        }
        factory(App\Models\User::class, 10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
