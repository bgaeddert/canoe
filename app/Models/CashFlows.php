<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashFlows extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'investment_id',
        'date',
        'return',
    ];
}