<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='Commande';
    protected $primaryKey='id';
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
