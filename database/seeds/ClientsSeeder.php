<?php

use Illuminate\Support\Facades\DB;

class ClientsSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $clients = [
            [
                'name' => 'Client 1',
                'permission' => serialize(['HF', 'PL', 'VC', 'RE', 'PC']),
                'description' => 'Client 1 can view all types of funds',
            ],
            [
                'name' => 'Client 2',
                'permission' => serialize(['VC', 'RE']),
                'description' => 'Client 2 can view VC and RE funds',
            ],
            [
                'name' => 'Client 3',
                'permission' => serialize(['PL', 'PC']),
                'description' => 'Client 3 can view PL and PC funds',
            ],
        ];

        DB::table('clients')->insert($clients);
    }
}