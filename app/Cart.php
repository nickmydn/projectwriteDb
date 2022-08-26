<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    protected $fillable = ['user_id','stationery_id','qty','subtotal'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function stationery(){
        return $this->belongsTo('App\Stationery');
    }
}
