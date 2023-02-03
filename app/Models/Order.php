<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'status','payment_type'];

    public function orderFields() {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder($payment_type) {

        // for order inserting to database

        $user = Auth::user();
        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending','payment_type'=>$payment_type]);


        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty,'status' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price*$cartItem->qty_days]);
        }
    }

    public function orderProducts() {

        return $this->belongsToMany(Product::class, 'order_products');
    }
}
