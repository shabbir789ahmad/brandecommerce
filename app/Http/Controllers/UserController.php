<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class UserController extends Controller
{
    function order()
    {
        $order=Order::join('details','orders.id','=','details.order_id')
        ->where('user_id',Auth::user()->id)
        ->get();
        return view('User.user_board',compact('order'));
    }
    function track($id)
    {
     $order=Order::join('details','orders.id','=','details.order_id')
        ->findorfail($id);
        //dd($order);
         return view('User.order_tracking',compact('order'));
    }
}
