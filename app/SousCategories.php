<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    protected $table='souscategorie';
    protected $primaryKey='id';

    public function categories()
    {
        return $this->belongsToMany('App\Categories','category_has_souscategorie','sousCategorie_id','Categorie_id');
    }
    public function produits() : HasMany
    {
        return $this->belongsToMany('App\Produits');
    }

}
