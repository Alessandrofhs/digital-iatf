<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'npk' => '000000',
            'departemen_id' => 14,
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $admin2 = User::create([
            'npk' => '111111',
            'departemen_id' => 16,
            'password' => bcrypt('12345678'),
        ]);
        $admin2->assignRole('admin');

        $guest = User::create([
            'npk' => '002327',
            'departemen_id' => 16,
            'password' => bcrypt('12345678'),
        ]);
        $guest->assignRole('guest');
    }
}
