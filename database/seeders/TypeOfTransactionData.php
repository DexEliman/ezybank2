<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfTransactionData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_transaction')->truncate();
        $data = [
            [
                'idTypeTrans' => 1,
                'nom' => 'Retrait',
            ],
            [
                'idTypeTrans' => 2,
                'nom' => 'Depot',
            ],
            [
                'idTypeTrans' => 3,
                'nom' => 'Transfert',
            ],
        ];

        DB::table('type_transaction')->insert($data);

    }
}
