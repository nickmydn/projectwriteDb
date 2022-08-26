<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $guarded = [];
    protected $fillable = ['user_id','date','name','price','qty','subtotal'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
