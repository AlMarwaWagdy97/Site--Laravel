<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(\App\Customer::class, 'user_id');
    }
}
