<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    
	public $table = "ubicacions";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "direccion",
		"latitud",
		"longitud"
	];

	public static $rules = [
	    
	];

}
