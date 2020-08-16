<?php

namespace App;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class Personnalisable extends Model
{
    protected $table = 'personnalisable';
    protected $primaryKey = 'id';
    protected $fillable = ['produit_id'];

    public static function AddOrRemove($pers,$id){
      $id=request('id')??$id;
        if($pers==1){
            Personnalisable::insert([
                "produit_id"=>$id,
            ]);
        }
        elseif($pers==0){
            $pr=Produit::where("id",$id)->first();
            if($pr){
                Personnalisable::where("produit_id",$id)->delete();
            }
        }
        return null;
    }
}
