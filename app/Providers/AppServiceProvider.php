<?php

namespace App\Providers;

use App\Mail\RequestSend;
use App\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

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
        //
        Request::created(function($request){
            Mail::to($request->trip->user->email)->send(new RequestSend($request));
        });

    }
}
