<?php

namespace App\Http\Controllers;

use App\Classes;
use App\EnterClass;
use Illuminate\Http\Request;

class EnterClassController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function enterOrLeaveClass(Request $data){
    	//check if the user has already entered the class
    	$checkEnter = EnterClass::where([
    		['classes_id', '=', $data['class_id']],
    		['user_id', '=', $data['user_id']]
    	])->first();

    	if($checkEnter){
    		//leave the class
	    	EnterClass::where([
	    		['classes_id', '=', $data['class_id']],
	    		['user_id',  '=', $data['user_id']]
	    	])->delete();

	    	return response()->json('You have now left the class.');
    	}else{
    		//validate data
    		$data = request()->validate([
    			'class_id' => ['required'],
    			'user_id' => ['required']
    		]);

			//enter the class
    		EnterClass::create([
    			'classes_id' => (int) $data['class_id'],
    			'user_id' => (int) $data['user_id']
    		]);
    		
    		return response()->json('You have now entered a class.');
   		}
    }
}
