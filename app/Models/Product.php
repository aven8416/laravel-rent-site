<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function categories() {

        return $this->belongsToMany(ProductCategory::class, 'product_categories');
    }

    public function orders() {
        $this->belongsToMany(OrderProduct::class, 'order_product');
    }

    public function brands() {

        return $this->belongsToMany(ProductBrand::class, 'product_brands');
    }

    public function recommends(){
        return $this->belongsTo(Recommend::class, 'pro_id');
    }
}
