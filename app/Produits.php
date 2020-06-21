<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImagesProduit;
class Produits extends Model
{
    protected $table='Produits';
    protected $primaryKey='id';
   

    public function categories(){
        return $this->belongsToMany('App\Categories');
    }
    public function sousCategories(){
        return $this->belongsToMany('App\Categories');
    }
    /*
    public function images_prod(){
        return ImagesProduit::select('lien')->where('produits_id', $this->id)->first();
       
    }

    public function attributes(){
        return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    }*/
}
