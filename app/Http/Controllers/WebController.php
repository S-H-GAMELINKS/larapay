<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function checkout()
    {
        return view('web.checkout');
    }

    public function payment()
    {
        return view('web.payment');
    }

    public function set_token(Request $request)
    {

        $pay_jp_secret = env('MIX_PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $customer = \Payjp\Customer::create(array(
            "card" => request('token')
        ));

        $user = Auth::user();
        $user->token = $customer->id;
        $user->save();

        return response()->json($user);
    }

    public function pay(Request $request)
    {
        $pay_jp_secret = env('MIX_PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $user = Auth::user();

        $res = \Payjp\Charge::create(
            [
                "customer" => $user->token,
                "amount" => request('price'),
                "currency" => 'jpy'
            ]
        );

        return response()->json($res);
    }
}