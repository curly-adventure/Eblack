<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'Marque';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public"; // or use your own disk, defined in config/filesystems.php
        $destination_path = "logo"; // path relative to the disk above
        $this->uploadFileToDisk($value,$attribute_name,$disk,$destination_path);

    }
    public function nombreProduits($id){
        $produit=Produit::where("marque_id",$id)->get();
        $i=0;
        foreach ($produit as $key => $value) {
            $i=$i+1;
        }return $i;
       
    }
    protected function PromoProduits($marque,$percent){
        $mrq=Marque::find($marque);
        if($marque){
        $produits=Produit::where("marque_id",$mrq->id)->get();
        foreach ($produits as $produit) {
            $prix_achat_red=$produit->prix_achat-($produit->prix_achat*($percent/100));
            $prix_vente=Marge::prix_vente($prix_achat_red);
            $produit->update([
                "prix_achat" => $prix_achat_red,
                "prix_vente" => $prix_vente,
                "vrai_percent" => $percent,
            ]);
        }}
        return null;
    }
    
    public static function RemovePromoProduits($prmotion){
        $prm=Promotion::find($prmotion);
        $mrq=Marque::find($prm->marque_id);
        $percent=$prm->percent;
        $produits=Produit::where("marque_id",$mrq->id)->get();
     
        foreach ($produits as $produit) {
            $prix_achat=$produit->prix_achat/(-($percent/100)+1);
            $prix_vente=Marge::prix_vente($prix_achat);
            $produit->update([
                "prix_achat" => $prix_achat,
                "prix_vente" => $prix_vente,
                "vrai_percent" => null,
            ]);
        }
        return null;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function produits() : HasMany
    {
        return $this->hasMany('App\Models\Produit','marque_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
