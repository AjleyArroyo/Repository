<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    
	public $table = "tipo_usuarios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"descripcion"
	];

	public static $rules = [
	    "descripcion" => "alpha"
	];

}
