<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       app()->singleton('lang',function(){

        if(Auth::user()){

if(empty(Auth::user()->lang)){
    return 'en';
}else{return (Auth::user()->lang);}



        }else{

if(Session::has('lang')){
    return Session::get('lang'); 
}else{
    return 'en';
}


        }

       });


        Schema::defaultStringLength(191);
    }
}
