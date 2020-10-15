<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public function getPermissionAttribute($value){
        return \unserialize($value);
    }

    public function investments(){
        return $this->hasMany(Investments::class, 'client_id', 'id');
    }
}