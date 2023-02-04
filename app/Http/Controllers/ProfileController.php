<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders')->where('orders.user_id', '=', $user_id)->get();

        return view('profile.orders', compact('orders'));
    }

    public function view_order_details($id) {
        $ProductsDetails =  DB::table('order_product')->rightJoin('products', 'products.id', '=', 'order_product.products_id')->rightJoin('orders', 'orders.id', '=', 'order_product.orders_id')->where('orders_id', '=', $id)->get();

        return view('profile.orderDetails', compact('ProductsDetails'));
    }


    public function Address() {
        $user_id = Auth::user()->id;
        $address_data = DB::table('addresses')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();
        return view('profile.address', compact('address_data'));
    }

    public function updateAddress(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|min:2|max:50',
            'passport_n' => 'required|min:9|max:9',
            'identification_n' => 'required|min:14|max:14',
            'address' => 'required']);

        $userid = Auth::user()->id;
        DB::table('addresses')->where('user_id', $userid)->update($request->except('_token'));

        return back()->with('msg','Ваш адрес был обновлен');
    }

    public function Password() {
        return view('profile.updatePassword');
    }

    public function updatePassword(Request $request) {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;


        if(!Hash::check($oldPassword, Auth::user()->password)){
            return back()->with('msg','Старый пароль не совпадает с текущим'); //when user enter wrong password as current password

        }else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
            return back()->with('msg','Пароль успешно обновлен');
        }
        // echo 'here update query for password';
    }

}
