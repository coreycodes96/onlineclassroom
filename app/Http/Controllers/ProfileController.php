<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index($id){
    	//checking if the logged in users ID matches
    	if(auth()->user()->id == $id){
    		//checking if the user isn't an admin
    		if(auth()->user()->admin == 0){
                //getting the logged in users classes
                $getUserClasses = Classes::whereIn('id', auth()->user()->enterclass->pluck('classes_id'))->get();

    			//return the profile home view
    			return view('loggedin.profile.home', compact('getUserClasses'));
    		}else{
    			//if the user is an admin redirect them back to the admin page
    			return redirect('/admin');
    		}
    	}else{
    		//if the ID doesn't match redirect the user back to their page
    		return redirect('/profile/'.auth()->user()->id);
    	}
    }
}
