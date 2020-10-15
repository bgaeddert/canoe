<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FundsController extends Controller
{
    public function index(Request $request)
    {
        $types = $request->input('types');

        if(!empty($types)){
            $funds = Funds::whereIn('type', $types)->get();
        }else{
            $funds = Funds::all();
        }

        return new Response($funds);
    }
}