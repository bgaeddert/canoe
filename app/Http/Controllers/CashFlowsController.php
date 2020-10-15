<?php

namespace App\Http\Controllers;

use App\Models\CashFlows;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CashFlowsController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $cashFlow = new CashFlows([
            'investment_id' => $input['investment_id'],
            'date' => date('Y-m-d', strtotime($input['date'])),
            'return' => $input['return'] / 100,
        ]);

        $cashFlow->saveOrFail();

        return new Response(['Success' => true]);
    }
}