<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        
       
    }


    public function showorders(){

        $orders = Order::all();
        return view('admin.orders',compact('orders'));
    }



public function finishorder($id){



$order = Order::FindOrFail($id);
$order->status = 2 ;
$order->save();

$notification = new Notification();
$notification->user_id = $order->user_id;
$notification->title = "New Oderd Arrived";
$notification->body = "Your Order is Arred To You .. Be Ready To Take It";
$notification->notification_type = 0 ;
$notification->save();
return back()->with('sucsess','The Order Has Been finished And Delevered To Customer');

}

public function showorderditail($id){
    $order = Order::FindOrFail($id);
    
    return view('admin.showorderdetail',compact('order'));


}


}
