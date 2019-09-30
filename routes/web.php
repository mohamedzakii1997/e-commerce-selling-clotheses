<?php

use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lang/{lang}',function($lang){


if(in_array($lang,['en','ar'])){


if(Auth::user()){
$user = Auth::user();
$user->lang = 'en';
$user->save();

}else{
if(Session::has('lang')){
    Session::forget('lang');
}
Session::put('lang',$lang);
}




}
else{
    if(Auth::user()){
        $user = Auth::user();
        $user->lang = $lang;
        $user->save();
        
        }else{
        if(Session::has('lang')){
            Session::forget('lang');
        }
        Session::put('lang',$lang);
        }



    }
    return back();
});


Route::group(['middleware' => ['lang']], function () {
    

    Route::get('/', function () {
        return view('auth.login');
    });


    Auth::routes();
/*user controlls */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/users', 'AdminController@index');  
    Route::get('/edituser/{id}','AdminController@edituser');
    Route::post('/updateuser/{id}','AdminController@updateuser');
    Route::get('/deleteuser/{id}','AdminController@deleteuser');

/* product contorlls */

Route::resource('/products', 'ProductController');
Route::get('/products/{id}/getImage', 'ProductController@getImage');


/** order controlls */

Route::get('/orders', 'OrderController@showorders');
Route::get('/finishorder/{id}', 'OrderController@finishorder');
Route::get('/showorderditail/{id}', 'OrderController@showorderditail');


/** fornt end links */

/** cart */
Route::get('/shop', 'UserController@showproducts');
Route::get('/getImage/{id}', 'HomeController@getImage');

Route::get('/get_notification', 'HomeController@get_notification');
Route::get('/cart', 'UserController@showcart');
Route::get('/search/{id}', 'UserController@show');
Route::get('/product/{id}', 'UserController@showone');
Route::get('/decream/{id}', 'UserController@decproduct');
Route::get('/incream/{id}', 'UserController@incproduct');
Route::get('/myorders','UserController@showmyorders');
Route::get('/orderdetails/{id}','UserController@showmyorderdetails');
Route::get('/productimage/{id}','UserController@getImage');
/** checkout */

Route::get('/checkout', 'UserController@checkout');
Route::post('/payment/{total}', 'UserController@payment');

Route::post('/criditpayment/{total}', 'UserController@criditpay');






































});








