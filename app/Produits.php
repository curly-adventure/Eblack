<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImagesProduit;

class Produits extends Model
{
    protected $table = 'Produits';
    protected $primaryKey = 'id';
    protected $fillable = ['quantite'];

    public function prix_barre()
    {
        if($this->vrai_percent){
             return null;
        }
        if ($this->faux_percent){
            $p=$this->faux_percent;
            return $this->prix_vente / ($p / 100);
        }
        return null;
    }

    public function getprice()
    {
        $prix = $this->prix_vente / 1000;
        return number_format($prix, 3, ',', '');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }
    public function sousCategories()
    {
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
