<?php

namespace App\Http\Controllers;

use App\Models\Investments;
use Illuminate\Http\Response;

class InvestmentsController extends Controller
{
    public function show($id)
    {
        $investment = Investments::with(['CashFlows'])->find($id);

        return new Response($investment);
    }
}