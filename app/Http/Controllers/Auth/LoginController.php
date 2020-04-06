<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
    	//checking if the user is logged in
    	$this->middleware('LoggedIn')->except('logout');
        //$this->middleware('guest')->except('logout');
    }

    protected function login(Request $data){
    	//attempt to log the user in with the information they has given
    	if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
    		//if the information passes
    		return response()->json(['admin' => auth()->user()->admin, 'id' => auth()->user()->id], 200);
    	}else{
    		//if the information doesn't pass
    		return response()->json('Information is incorrect', 200);
    	}
    }
}
