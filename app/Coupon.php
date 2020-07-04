<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='bon_reduction';
    protected $primaryKey='id';

    public function discount($subtotal)
    {
        return (floatval($subtotal) * intval($this->utilise)/100);
          
    }
}
