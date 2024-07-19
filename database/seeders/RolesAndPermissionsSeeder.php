<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'edit own']);
        Permission::create(['name' => 'delete own']);
        Permission::create(['name' => 'comment']);
        Permission::create(['name' => 'vote']);
        Permission::create(['name' => 'analytics']); //official+
        Permission::create(['name' => 'review']); //moderator+
        Permission::create(['name' => 'manage user']); //admin
        Permission::create(['name' => 'admin settings']); //admin

        Role::create(['name' => 'user'])
            ->givePermissionTo(['create', 'view', 'edit own', 'delete own', 'comment', 'vote']);

        Role::create(['name' => 'driver'])
            ->givePermissionTo(['create', 'view', 'edit own', 'delete own', 'comment', 'vote']);

        Role::create(['name' => 'official'])
            ->givePermissionTo(['create', 'view', 'edit own', 'delete own', 'comment', 'vote', 'analytics']);

        Role::create(['name' => 'moderator'])
            ->givePermissionTo(['create', 'view', 'edit own', 'delete own', 'comment', 'vote', 'analytics', 'review']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['create', 'view', 'edit own', 'delete own', 'comment', 'vote', 'analytics', 'review', 'manage user', 'admin settings']);
    }
}
