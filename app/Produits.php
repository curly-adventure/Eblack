<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $table='Produits';
    protected $primaryKey='id';
   

    public function categories(){
        return $this->belongsToMany('App\Categories');
    }
}
