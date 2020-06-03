<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'Produits';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'images' => 'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function categorie()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function sousCategorie()
    {
        return $this->belongsTo('App\Models\Souscategorie');
    }

    public function marque()
    {
        return $this->belongsTo('App\Models\Marque');
    }
    public function photos() : HasMany

    {

        return $this->hasMany('App\Models\Images');

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
    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = "public"; // or use your own disk, defined in config/filesystems.php
        $destination_path = "logo"; // path relative to the disk above
        $this->uploadFileToDisk($value,$attribute_name,$disk,$destination_path);

    }
}
