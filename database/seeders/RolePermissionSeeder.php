<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-dokumen']);
        Permission::create(['name'=>'edit-dokumen']);
        Permission::create(['name'=>'hapus-dokumen']);
        Permission::create(['name'=>'lihat-dokumen']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'guest']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');
        $roleAdmin->givePermissionTo('tambah-dokumen');
        $roleAdmin->givePermissionTo('edit-dokumen');
        $roleAdmin->givePermissionTo('hapus-dokumen');
        $roleAdmin->givePermissionTo('lihat-dokumen');

        $roleGuest = Role::findByName('guest');
        $roleGuest->givePermissionTo('lihat-user');
        $roleGuest->givePermissionTo('lihat-dokumen');
    }
}
