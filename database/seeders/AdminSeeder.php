<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nom' => 'Admin',
            'email' => 'admin@admin.com',
            'mot_passe' => Hash::make('123456789'),
            'role' => 'administrateur',
            'date_embauche' => '2023-01-01',
            'poste' => 'Developpeur',
            'adresse' => 'Monastir',
            'date_naissance' => '2001-01-01'
        ]);
    }
}
