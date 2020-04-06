<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {
        //checking if the user is logged in
        $this->middleware('LoggedIn');
    }

    protected function validator(array $data)
    {
        //validate the data given
        return Validator::make($data, [
            'firstname' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'unique:users'],
            'gender' => ['required'],
            'year' => ['required'],
            'month' => ['required'],
            'day' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        //create an account
        return User::create([
            'admin' => 0,
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'dob' => $data['year'].'-'.$data['month'].'-'.$data['day'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function register(\Illuminate\Http\Request $request)
    {
        // validate the form 
        $this->validator($request->all())->validate();

        // add the user
        $this->create($request->all());
    }
}
