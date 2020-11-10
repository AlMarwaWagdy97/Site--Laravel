<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Fillable example
    //protected $fillable = ['name', 'email', 'active'];

    //Guard example
    protected $guarded = [];

//  getActiveattribute
    protected $attributes=['active' => 1];
    public function getActiveAttribute($attr){
        return $this->ActiveOptions()[$attr];
    }

//  Active Quary
    public function scopeActive($query){
        return $query->where('active', 1);
    }

//  Inactive quary
    public function scopeInactive($query){
        return $query->where('active', 0);
    }

//  Many to one
    public function company(){
       return $this->belongsTo(Company::class);
    }

    public function ActiveOptions(){
        return [
            0 => 'Inactive',
            1 => 'Active',
            2 => 'In Progress',
        ];
    }

    // One To one 
    public function phone(){
        return $this->hasOne(\App\Phone::class);
    }
}
