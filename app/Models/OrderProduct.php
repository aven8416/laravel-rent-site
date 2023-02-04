<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    public function products() {

        return $this->hasMany(Product::class, 'products_id');
    }

    public function orders() {

        return $this->hasMany(Order::class, 'orders_id');
    }
}
