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
        $user = Auth::user();
        $user->token = request('token');
        $user->save();

        return response()->json($user);
    }
}