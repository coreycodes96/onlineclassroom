<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create An Admin
        $user = new User;

        $user->admin = 1; //ID
        $user->firstname = 'Original'; //FIRSTNAME
        $user->surname = 'Admin'; //SURNAME
        $user->email = 'admin@outlook.com'; //EMAIL
        $user->dob = '1996-11-04'; //DATE OF BIRTH
        $user->gender = 'male'; //GENDER
        $user->password = '$2y$10$.L5EtY0kir8rNxPmWHpozuZF5gy.i1OeUi37euPz.AgP0CC4BzSKa'; //PASSWORD
        $user->save(); //SAVE
    }
}
