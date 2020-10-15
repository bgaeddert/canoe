<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Funds;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::all();

        return new Response($clients);
    }

    public function show($id)
    {
        $client = Clients::with(['Investments.CashFlows','Investments.Fund'])->find($id);

        return new Response($client);
    }

    public function availableFunds(Request $request, $id)
    {
        $client = Clients::find($id);
        $funds = Funds::all();

        $allowed = $client->permission;

        $funds = array_map(function ($fund) use ($allowed) {
            if (in_array($fund['type'], $allowed)) {
                return $fund;
            }

            return [
                'id' => $fund['id'],
                'name' => '***',
                'type' => $fund['type'],
                'inception_date' => '************',
                'description' => '******************',
            ];
        }, $funds->toArray());

        return new Response(['client' => $client, 'funds' => $funds]);
    }

    public function investments(Request $request, $clientId){
        $client = Clients::find($clientId);

        $types = $client->permissions;

        if(!empty($types)){
            $funds = Funds::whereIn('type', $types)->get();
        }else{
            $funds = Funds::all();
        }

        $investments = InvestmentsController::whereIn('fund_id', $funds->pluck('id'))->get();

        return new Response(['client' => $client, 'funds' => $funds]);
    }
}