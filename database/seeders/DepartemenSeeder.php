<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::create([
            'nama_departemen' => 'HR & GA'
        ]);
        Departemen::create([
            'nama_departemen' => 'IR & LEGAL'
        ]);
        Departemen::create([
            'nama_departemen' => 'MARKETING'
        ]);
        Departemen::create([
            'nama_departemen' => 'FINANCE & ACCOUNTING'
        ]);
        Departemen::create([
            'nama_departemen' => 'PURCHASING & EXIM'
        ]);
        Departemen::create([
            'nama_departemen' => 'NEW PROJECT & LOCALIZATION'
        ]);
        Departemen::create([
            'nama_departemen' => 'BODY COMPONENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'PROD UNIT MACHINING'
        ]);
        Departemen::create([
            'nama_departemen' => 'PPIC'
        ]);
        Departemen::create([
            'nama_departemen' => 'ENGINERING BODY'
        ]);
        Departemen::create([
            'nama_departemen' => 'ENGINERING UNIT'
        ]);
        Departemen::create([
            'nama_departemen' => 'MAINTENANCE'
        ]);
        Departemen::create([
            'nama_departemen' => 'QA BODY COMPONENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'MANAGEMENT SYSTEM'
        ]);
        Departemen::create([
            'nama_departemen' => 'QA ENGINE COMPONENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'IT DEVELOPMENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'PRODUCTION SYSTEM & DEVELOPMENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'PROD UNIT DC'
        ]);
        Departemen::create([
            'nama_departemen' => 'ENGINEERING & QUALITY ELECTRICAL COMPONENT'
        ]);
        Departemen::create([
            'nama_departemen' => 'PPIC ELECTRIC'
        ]);
        Departemen::create([
            'nama_departemen' => 'PRODUCTION ELECTRIC'
        ]);
        Departemen::create([
            'nama_departemen' => 'MAINTENANCE ELECTRIC'
        ]);
    }
}
