<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterClass extends Model
{
	//Don't insert created_at and update_at
	public $timestamps = false;

	//Fillables
    public $fillable = [
    	'classes_id', 'user_id'
    ];

    //creating a relationship with the class model
    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    //creating a relationship with the user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
