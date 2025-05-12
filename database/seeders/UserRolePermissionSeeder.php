<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'view archived user']);
        Permission::create(['name' => 'create archived user']);
        Permission::create(['name' => 'update archived user']);
        Permission::create(['name' => 'delete archived user']);

        Permission::create(['name' => 'view setting']);
        Permission::create(['name' => 'create setting']);
        Permission::create(['name' => 'update setting']);
        Permission::create(['name' => 'delete setting']);

        Permission::create(['name' => 'view car brand']);
        Permission::create(['name' => 'create car brand']);
        Permission::create(['name' => 'update car brand']);
        Permission::create(['name' => 'delete car brand']);

        Permission::create(['name' => 'view car model']);
        Permission::create(['name' => 'create car model']);
        Permission::create(['name' => 'update car model']);
        Permission::create(['name' => 'delete car model']);

        Permission::create(['name' => 'view body type']);
        Permission::create(['name' => 'create body type']);
        Permission::create(['name' => 'update body type']);
        Permission::create(['name' => 'delete body type']);

        Permission::create(['name' => 'view fuel type']);
        Permission::create(['name' => 'create fuel type']);
        Permission::create(['name' => 'update fuel type']);
        Permission::create(['name' => 'delete fuel type']);

        Permission::create(['name' => 'view feature']);
        Permission::create(['name' => 'create feature']);
        Permission::create(['name' => 'update feature']);
        Permission::create(['name' => 'delete feature']);


        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $sellerRole = Role::create(['name' => 'seller']);
        $userRole = Role::create(['name' => 'user']);

        // give all permissions to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // give permissions to admin role.
        $adminRole->givePermissionTo(['view role']);
        $adminRole->givePermissionTo(['view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);


        // Create User and assign Role to it.

        //super admin
        $superAdminUser = User::firstOrCreate([
                    'email' => 'superadmin@gmail.com',
                ], [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'username' => 'superadmin',
                    'password' => Hash::make ('superadmin@gmail.com'),
                    'email_verified_at' => now(),
                ]);

        $superAdminUser->assignRole($superAdminRole);

        $superAdminProfile = $superAdminUser->profile()->firstOrCreate([
            'user_id' => $superAdminUser->id,
        ], [
            'user_id' => $superAdminUser->id,
            'first_name' => $superAdminUser->name,
        ]);

        //seller

        $sellerUser = User::firstOrCreate([
                    'email' => 'seller@gmail.com',
                ], [
                    'name' => 'Seller',
                    'email' => 'seller@gmail.com',
                    'username' => 'seller',
                    'password' => Hash::make ('seller@gmail.com'),
                    'email_verified_at' => now(),
                ]);

        $sellerUser->assignRole($sellerRole);

        $sellerProfile = $sellerUser->profile()->firstOrCreate([
            'user_id' => $sellerUser->id,
        ], [
            'user_id' => $sellerUser->id,
            'first_name' => $sellerUser->name,
        ]);

        //admin
        $adminUser = User::firstOrCreate([
                            'email' => 'admin@gmail.com'
                        ], [
                            'name' => 'Admin',
                            'username' => 'admin',
                            'email' => 'admin@gmail.com',
                            'password' => Hash::make ('admin@gmail.com'),
                            'email_verified_at' => now(),
                        ]);

        $adminUser->assignRole($adminRole);

        $adminUserProfile = $adminUser->profile()->firstOrCreate([
            'user_id' => $adminUser->id,
        ], [
            'user_id' => $adminUser->id,
            'first_name' => $adminUser->name,
        ]);
    }
}
