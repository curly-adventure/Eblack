<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achats extends Model
{
    protected $table='achats';
    protected $primaryKey='id';
    static function max_num()
    {
        $max= Achats::orderBy('created_at','DESC')->first();
        if($max) return $max->num_achat;
        else return 1000;
    }
}
