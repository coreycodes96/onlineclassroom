<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        //checking if the user is logged in
        if(Auth::check()){
            //checking if the user is an admin
            if(auth()->user()->admin != 1){
                //if the user is not an admin send them to the classes page
                return redirect('/profile/'.auth()->user()->id);
            }
        }
        return $next($request);
    }
}
