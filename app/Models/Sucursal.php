<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    
	public $table = "sucursals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"telefono"
	];

	public static $rules = [
	    
	];

}
