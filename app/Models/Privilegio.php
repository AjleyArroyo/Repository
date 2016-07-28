<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    
	public $table = "privilegios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre"
	];

	public static $rules = [
	    
	];

}
