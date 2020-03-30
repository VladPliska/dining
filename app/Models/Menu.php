<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'name','img','ingredients','price','weight'
    ];

    public function dishData(){
        return $this->hasMany('App\Models\Orders');
    }
}
