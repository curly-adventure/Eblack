<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['fournisseur_id','p_name','p_code','p_color','description','prix','image'];

    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    /*public function attributes(){
        return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    }
    public function productImages(){
        return $this->hasMany('App\ProductsImage', 'product_id');
    }*/
}
