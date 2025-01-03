<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfCardData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'nom' => 'Physique',
            ],
            [
                'id' => 2,
                'nom' => 'Virtuel',
            ],

        ];

        DB::table('type_card')->insert($data);

    }
}
