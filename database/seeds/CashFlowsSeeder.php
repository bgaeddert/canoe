<?php

use Illuminate\Support\Facades\DB;

class CashFlowsSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $cashFlows = [
            [
                'investment_id' => 1,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 2,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 3,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 4,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 5,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 6,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
            [
                'investment_id' => 7,
                'date' => '2017-02-01',
                'return' => 0.05
            ],
        ];

        DB::table('cash_flows')->insert($cashFlows);
    }
}