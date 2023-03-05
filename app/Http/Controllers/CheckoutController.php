<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index() {
        // check for user login
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $cartItems = Cart::content();
            $address_data = DB::table('addresses')->where('user_id', '=', $userid)->orderby('id', 'DESC')->get();
            return view('front.checkout', compact('cartItems','address_data'));
        } else {
            return redirect('login');
        }
    }

    public function formvalidate(Request $request) {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('d.m.Y');

        $this->validate($request, [
            'fullname' => 'required|min:2|max:50',
            'passport_n' => 'required|min:9|max:9',
            'identification_n' => 'required|min:14|max:14',
            'address' => 'required','phone'=>'required','city'=>'required',
            'birth'=> 'required|date|before:' . $before,
            'license_category' => 'required',
            'driving_experience' => 'required'
        ]);

        $userid = Auth::user()->id;


        $User = DB::table('addresses')->where('id', $userid)->get()->first();



        if(!$User) {

            $address = new Address();
            $address->fullname = $request->fullname;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->phone = $request->phone;
            $address->birth = $request->birth;
            $address->passport_n = $request->passport_n;
            $address->user_id = $userid;
            $address->identification_n = $request->identification_n;
            $address->license_category = json_encode($request->license_category);
            $address->driving_experience = $request->driving_experience;
            $address->save();

        }
        else {
            $fullname = $request->fullname;
            $address = $request->address;
            $city = $request->city;
            $phone = $request->phone;
            $birth = $request->birth;
            $passportN = $request->passport_n;
            $identificationN = $request->identification_n;
            $license_category = json_encode($request->license_category);
            $driving_experience = $request->driving_experience;

            DB::table('addresses')->where('user_id', $userid)->update(['fullname' => $fullname, 'address' => $address,'birth'=>$birth,'passport_n'=>$passportN,
                'identification_n'=> $identificationN,'phone'=>$phone,'city'=>$city, 'license_category'=>$license_category,'driving_experience'=>$driving_experience]);
        }
        $cartItems = Cart::content();
        return view('front.checkoutPay', compact('cartItems'));

    }


    public function payment(Request $request) {
        $payment_type = new Order();
        $payment_type->payment_type = $request->pay;

        Order::createOrder($payment_type->payment_type);

        Cart::destroy();
        return redirect('thankyou');
    }
}
