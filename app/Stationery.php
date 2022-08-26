<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationery extends Model
{
    protected $guarded = [];
    protected $fillable = ['name','photo'];

    public function stationeryType(){
        return $this->belongsTo('App\StationeryType');
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }
}
