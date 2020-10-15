<?php

use Illuminate\Support\Facades\DB;

class FundsSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // ['HF', 'PL', 'VC', 'RE', 'PC']
        $funds = [
            [
                'name' => 'HF1',
                'type' => 'HF',
                'inception_date' => '2010-01-01',
                'description' => 'First of the HF funds',
            ],
            [
                'name' => 'HF2',
                'type' => 'HF',
                'inception_date' => '2011-02-02',
                'description' => 'Second of the HF funds',
            ],
            [
                'name' => 'HF3',
                'type' => 'HF',
                'inception_date' => '2012-03-03',
                'description' => 'Third of the HF funds',
            ],

            [
                'name' => 'PL1',
                'type' => 'PL',
                'inception_date' => '2010-02-01',
                'description' => 'First of the PL funds',
            ],
            [
                'name' => 'PL2',
                'type' => 'PL',
                'inception_date' => '2011-03-02',
                'description' => 'Second of the PL funds',
            ],
            [
                'name' => 'PL3',
                'type' => 'PL',
                'inception_date' => '2012-04-03',
                'description' => 'Third of the PL funds',
            ],

            [
                'name' => 'VC1',
                'type' => 'VC',
                'inception_date' => '2010-05-01',
                'description' => 'First of the VC funds',
            ],
            [
                'name' => 'VC2',
                'type' => 'VC',
                'inception_date' => '2011-06-02',
                'description' => 'Second of the VC funds',
            ],
            [
                'name' => 'VC3',
                'type' => 'VC',
                'inception_date' => '2012-07-03',
                'description' => 'Third of the VC funds',
            ],

            [
                'name' => 'RE1',
                'type' => 'RE',
                'inception_date' => '2010-08-01',
                'description' => 'First of the RE funds',
            ],
            [
                'name' => 'RE2',
                'type' => 'RE',
                'inception_date' => '2011-09-02',
                'description' => 'Second of the RE funds',
            ],
            [
                'name' => 'RE3',
                'type' => 'RE',
                'inception_date' => '2012-10-03',
                'description' => 'Third of the RE funds',
            ],

            [
                'name' => 'PC1',
                'type' => 'PC',
                'inception_date' => '2010-11-01',
                'description' => 'First of the PC funds',
            ],
            [
                'name' => 'PC2',
                'type' => 'PC',
                'inception_date' => '2011-12-02',
                'description' => 'Second of the PC funds',
            ],
            [
                'name' => 'PC3',
                'type' => 'PC',
                'inception_date' => '2013-01-03',
                'description' => 'Third of the PC funds',
            ],
        ];

        DB::table('funds')->insert($funds);
    }
}