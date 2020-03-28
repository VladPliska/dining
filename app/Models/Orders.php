<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table ='orders';

    protected $fillable =['dish_id','count','order_id'];
}
