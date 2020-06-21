<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table='Categorie';
    protected $primaryKey='id';

    public function sousCategories()
    {
        return $this->belongsToMany('App\SousCategories','category_has_souscategorie','Categorie_id','sousCategorie_id');
    }
    public function produits() : HasMany
    {
        return $this->belongsToMany('App\Produits');
    }

}
