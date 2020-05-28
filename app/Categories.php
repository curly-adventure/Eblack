<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table='Categorie';
    protected $primaryKey='id';
    

    public function produits(){
        return $this->belongsToMany('App\Produits');
    }
}
