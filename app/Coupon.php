<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='bon_reduction';
    protected $primaryKey='id';
    protected $fillable=['utilise'];
    public function discount($subtotal)
    {
        return (floatval($subtotal) * intval($this->valeur)/100);
          
    }
}
