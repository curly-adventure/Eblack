<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='achats';
    protected $primaryKey='id';
    protected $fillable = [
        'canceled','status_id','deleted_at'
    ];
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public static function alerteCommande(){
        return count(\App\Commande::All()->where('status_id',1));
    }
   
}
