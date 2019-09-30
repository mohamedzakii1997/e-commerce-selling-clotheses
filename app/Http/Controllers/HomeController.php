<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Service;
use App\Userservice;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Product;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use App\Notification;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:web,admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getImage($id){
        $product=Product::findOrFail($id);
        return Storage::get($product->image);
    }

    public function index()
    {
        $notifications = DB::table('notifications')->where('user_id','=',Auth::user()->id)->where('readed','=',0)->get();
        
$products = DB::table('products')->where('rate','>',7)->get();


        return view('home',compact('products','notifications'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }



public function get_notification(){


    $message = '';
$notifiaction = Notification::where('user_id','=',Auth::user()->id)->where('readed','=',0)->get();
$notifiaction_number = Notification::where('user_id','=',Auth::user()->id)->where('readed','=',0)->count();

$allnotifiy =  Notification::where('user_id','=',Auth::user()->id)->get();

if($notifiaction_number>0){


    foreach($notifiaction as $row)
    {
        $message .= '
        <a class="dropdown-item" href="'.$row->header.'">
        '.$row->title.'
        
        <br>
        '.$row->body.'
        </a>
    ';
    }





} 


Session::put('notification_number',$notifiaction_number);

$data = array(
'notification'  => $message,
'number'=>$notifiaction_number    
);


return response()->json($data);




}

}
