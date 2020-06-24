<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Client extends Authenticatable
{
    use Notifiable;
    protected $table='Clients';
    protected $primaryKey='id';

    protected $fillable = [
        'nom','prenom','email', 'motdepasse','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'motdepasse','Adresse_id', 'remember_token',
    ];


    public function getAuthPassword()
    {
      return $this->motdepasse;
    }

    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
    
}
