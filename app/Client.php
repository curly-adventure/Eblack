<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='Clients';
    protected $primaryKey='id';

    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
}
