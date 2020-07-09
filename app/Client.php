<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LamaLama\Wishlist\HasWishlists;

class Client extends Authenticatable
{
    use Notifiable;
    use HasWishlists;
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

    public function password()
    {
        return 'motdepasse';
    }

    public function getAuthPassword()
    {
      return $this->motdepasse;
    }

    public function commandes(){
        return Commande::all()->where('client_id', $this->id);
    }

    public function commande()
    {
        return $this->hasMany('App\Commande');
    }
    
}
