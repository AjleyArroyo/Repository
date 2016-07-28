<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
	public $table = "categorias";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    
		"nombre",
		"descripcion",
	];

	public static $rules = [
	    
	];

}
