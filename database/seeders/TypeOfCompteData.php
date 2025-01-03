<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfCompteData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_compte')->truncate();
        
        $data = [
            [
                'id' => 1,
                'nomTypeCompte' => 'Courrant',
            ],
            [
                'id' => 2,
                'nomTypeCompte' => 'Epargne',
            ],

        ];

        DB::table('type_compte')->insert($data);

    }
}
