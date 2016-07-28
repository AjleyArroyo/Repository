<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->insert (array('name'=>'Rosangela','email'=>'rosy28_94@hotmail.com','password'=>\Hash::make('secret')));
	}

}
