<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table ='orders';

    protected $fillable =['menu_id','count','order_id','created_at','updated_at'];

    function getDish(){
        return $this->belongsTo('App\Models\Menu','menu_id');
    }
}
