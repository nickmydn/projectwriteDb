<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationeryType extends Model
{
    protected $guarded = [];
    protected $fillable = ['name','stationery_type_id','stock','price','description','photo'];

    public function stationeries(){
        return $this->hasMany('App\Stationery');
    }

    protected $table = 'stationery_types';
}
