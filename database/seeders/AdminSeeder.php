<?php

namespace Database\Seeders;

use App\Models\Admin;
// use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

// use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Seed Roles
        $superAdminRole      = Role::create(['name' => 'super-admin']);
        // $ambassadorRole   = Role::create(['name' => 'ambassador']);


        // =========== ( Main Admin ) ============= \\
        $admin = Admin::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // avatar
        $admin->addMedia(public_path('/demo/avatar.png'))
            ->preservingOriginal()
            ->toMediaCollection('avatar');


        // Assign roles
        $admin->assignRole($superAdminRole);
    }
}
