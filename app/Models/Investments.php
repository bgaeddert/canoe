<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    public function cashFlows(){
        return $this->hasMany(CashFlows::class, 'investment_id', 'id');
    }

    public function fund(){
        return $this->hasOne(Funds::class, 'id', 'fund_id');
    }
}