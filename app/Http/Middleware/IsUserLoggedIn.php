<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserLoggedIn
{
    public function handle($request, Closure $next)
    {
        //check if the user is logged in
        if(Auth::check()){
            //get the users admin column
            $userAdmin = auth()->user()->admin;

            if($userAdmin == 0){
                //if the user isn't an admin
                return redirect('/profile/'.auth()->user()->id);
            }else{
                //if the user is an admin
                return redirect('/admin');
            }
        }
        return $next($request);
    }
}
