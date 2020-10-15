<?php

use Illuminate\Support\Facades\DB;

class InvestmentsSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $investments = [
            [
                'name' => 'C1HF1 investment',
                'client_id' => 1,
                'fund_id' => 1,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],
            [
                'name' => 'C1PL1 investment',
                'client_id' => 1,
                'fund_id' => 4,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],
            [
                'name' => 'C1VC1 investment',
                'client_id' => 1,
                'fund_id' => 7,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],

            [
                'name' => 'C2VC1 investment',
                'client_id' => 2,
                'fund_id' => 7,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],

            [
                'name' => 'C2RE1 investment',
                'client_id' => 2,
                'fund_id' => 10,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],

            [
                'name' => 'C3PC1 investment',
                'client_id' => 3,
                'fund_id' => 13,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],
            [
                'name' => 'C3PL1 investment',
                'client_id' => 3,
                'fund_id' => 4,
                'date' => '2017-01-01',
                'amount' => 1000000
            ],
        ];

        DB::table('investments')->insert($investments);
    }
}