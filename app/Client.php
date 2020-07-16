<?php

namespace App;

use LamaLama\Wishlist\HasWishlists;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    public function setPasswordAttribute($value) {
        $this->attributes['motdepasse'] = Hash::make($value);
    }

    public function password()
    {
        return 'motdepasse';
    }

    public function getAuthPassword()
    {
      return $this->motdepasse;
    }

    public function commandes(){
        return Commande::where('client_id', $this->id)->orderBy('created_at', 'DESC')->get();
    }

    public function commande()
    {
        return $this->hasMany('App\Commande');
    }
    
}
