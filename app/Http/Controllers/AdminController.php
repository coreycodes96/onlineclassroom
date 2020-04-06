<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes;
use App\EnterClass;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
    	//checking if the user is logged in
    	$this->middleware('auth');

    	//checking if the user is an admin
    	$this->middleware('IsAdmin');
    }

    public function index(){
    	//return the admin view
    	return view('loggedin.admin.home', compact('users', 'classes'));
    }

    public function classes(){
        //get all the classes
        $classes = Classes::latest('id')->get();

        return response()->json($classes, 200);
    }

    public function users(){
        //get all the classes
        $users = User::where('admin', '!=', 1)->latest('id')->get();

        return response()->json($users, 200);
    }

    protected function store(Request $data){
        //validation
        $data = request()->validate([
            'title' => ['required'],
            'info' => ['required']
        ]);

        //create the class
        Classes::create([
            'title' => $data['title'],
            'info' => $data['info']
        ]);

        return response()->json($data, 200);
    }

    public function deleteClass($id){
        //delete class
        Classes::where('id', '=', $id)->delete();

        //remove all the users class entries based on class ID
        EnterClass::where('classes_id', '=', $id)->delete();

        return 'class deleted';
    }

    public function deleteUser($id){
        //delete the users account
        User::where('id', '=', $id)->delete();

        return 'user deleted';
    }
}
