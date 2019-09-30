<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Service;
use \App\Userservice;
use DB;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Order_item;

use App\Order;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
        
       
    }


    public function show($id)
    {
        
     $cart = new Cart();
     $cart->product_id = $id;
     $cart->user_id = Auth::user()->id;
     $cart->quantity = 1;
     $cart->save();
       
     
    
     

     $message = '
        
        <div class="alert alert-primary" style="margin:18px;" role="alert">
     Product Added To Cart
     </div>
        
        
        
        ';

        $cart = Cart::where('user_id','=',Auth::user()->id)->count();
        Session::put('cart_number',$cart);

        $data = array(
    'message'  => $message,
       'number'=>$cart    
);


     return response()->json($data);

    }

    public function showcart()
    {
    /* $cart = DB::table('carts')->where('user_id','=',Auth::user()->id)->get();
    return $cart[0]->product;
       */
      /*
      $cart = Cart::with('product')->where('user_id',Auth::user()->id)->get();
      return $cart;*/
      $cart = DB::table('carts')->where('user_id','=',Auth::user()->id)->pluck('product_id');
      //$product = DB::table('products')->whereIn('id','=',$cart)->get();
     $product = Product::whereIn('id',$cart)->get();
     // $products_total = $product->sum('price');
    $cart_num = DB::table('carts')->where('user_id','=',Auth::user()->id)->pluck('quantity');
     $product_num = Product::whereIn('id',$cart)->pluck('price');
     
     $products_total = 0;
     for($i = 0 ; $i<$product_num->count();$i++){
 
        $products_total = $products_total + $product_num[$i]*$cart_num[$i];

     }
   

        return view('cart',compact('product','products_total',));

    }

    public function showproducts()
    {
        $products = Product::paginate(12);
       
        return view('shop',compact('products'));

    }

    public function showone($id)
    {
        $product = Product::FindOrFail($id);
       
        return view('singleproduct',compact('product'));

    }


public function decproduct($id){

    $product = Product::where('id','=',$id)->pluck('price')->first();

$cart=Cart::where('user_id','=',Auth::user()->id)->where('product_id','=',$id)->first();
if($cart->quantity > 1){

    $cart->quantity --;
    $cart->save();
    
}

return response()->json($product);

}



public function incproduct($id){

    $product = Product::where('id','=',$id)->pluck('price')->first();

    $cart=Cart::where('user_id','=',Auth::user()->id)->where('product_id','=',$id)->first();
    
    
        $cart->quantity ++;
        $cart->save();
        
    
    
    return response()->json($product);



}


public function checkout(){

    $cart = DB::table('carts')->where('user_id','=',Auth::user()->id)->pluck('product_id');
  $cart_num = DB::table('carts')->where('user_id','=',Auth::user()->id)->pluck('quantity');
   $product_num = Product::whereIn('id',$cart)->pluck('price');
   
   $products_total = 0;
   for($i = 0 ; $i<$product_num->count();$i++){

      $products_total = $products_total + $product_num[$i]*$cart_num[$i];

   }

  
return view('checkout',compact('products_total','cart'));

}


public function payment(Request $request,$total){
    $cart = DB::table('carts')->where('user_id','=',Auth::user()->id)->get();

if($request->optradio == 'delevery')
    {

        if($total != 0){ 
$order = new Order();
$order->status = 1 ;
$order->user_id = Auth::user()->id;
$order->payment_method = 'delevery' ;
$order->price = $total;
$order->delevery_cost = 0.00;
$order->address = Auth::user()->address;
$order->save();

for($i = 0 ; $i<$cart->count(); $i++){

$order_item = new Order_item();
$order_item->product_id = $cart[$i]->product_id;
$order_item->order_id = $order->id;
$order_item->quantity = $cart[$i]->quantity;
$order_item->save();
Cart::FindOrFail($cart[$i]->id)->delete();

}
$total = 0 ;
Session::forget('cart_number');


return back()->with('order_sucsess','Your Order Has Been Placed To You');

    }else{
        return back()->with('order_sucsess','No Product In Cart');

    }

    } 

}


public function criditpay(Request $request,$total){

    $cart = DB::table('carts')->where('user_id','=',Auth::user()->id)->get();
    if($total != 0){ 
        $order = new Order();
        $order->status = 1 ;
        $order->user_id = Auth::user()->id;
        $order->payment_method = 'cridit' ;
        $order->price = $total;
        $order->delevery_cost = 0.00;
        $order->address = Auth::user()->address;
        $order->save();
        
        for($i = 0 ; $i<$cart->count(); $i++){
        
        $order_item = new Order_item();
        $order_item->product_id = $cart[$i]->product_id;
        $order_item->order_id = $order->id;
        $order_item->quantity = $cart[$i]->quantity;
        $order_item->save();
        Cart::FindOrFail($cart[$i]->id)->delete();
        
        }
        
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_cXeebuDm05ExJ0TCQIKAPuyP00ywvQmbP9');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
    'amount' => $total *100,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);

        $total = 0 ;
        Session::forget('cart_number');
        
        
        return back()->with('order_sucsess','Your Order Has Been Placed To You');
        
            }else{
                return back()->with('order_sucsess','No Product In Cart');
        
            }



}

public function getImage($id){
    $product=Product::findOrFail($id);
    return Storage::get($product->image);
}




public function showmyorders(){

$orders = Order::where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();

return view('myorders',compact('orders'));


}

public function showmyorderdetails($id){

$order = Order::FindOrFail($id);
return view('myorderdetail',compact('order'));

}


}
