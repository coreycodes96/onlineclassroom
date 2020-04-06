<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	//Don't insert created_at and update_at
	public $timestamps = false;
	
	//Fillables
    public $fillable = [
    	'title', 'info'
    ];

    //creating a relationship with the enter class model
    public function enterclass(){
    	return $this->hasMany(EnterClass::class);
    }
}
