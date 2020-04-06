<?php

namespace App\Http\Controllers;

use App\Classes;
use App\EnterClass;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	//if the user isn't an admin
    	if(auth()->user()->admin == 0){
    		//get all the classes
    		$classes = Classes::latest('id')->with('enterclass')->get();

    		//return the classes view
    		return view('loggedin.classes.home', compact('classes'));
    	}else{
    		//if the user is an admin
    		return redirect('/admin');
    	}
    }
}
