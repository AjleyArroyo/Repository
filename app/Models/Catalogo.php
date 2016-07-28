<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    
	public $table = "catalogos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"anio",
		"descripcion"
	];

	public static $rules = [
	    
	];

	public function muebles(){
		return $this->belongsToMany('App\Models\Catalogo','detalle_catalogos','idCatalogo','idMueble');
	}

}
