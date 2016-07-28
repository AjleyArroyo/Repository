<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    
	public $table = "muebles";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"descripcion",
		"color",
		"nombreImagen",
		"idCategoria"
	];

	public static $rules = [
	    
	];

public function categoria()
{
	return $this->belongsTo('App\Models\Categoria','idCategoria','id');
}
	public function catalogos(){
		return $this->belongsToMany('App\Models\Catalogo');
	}
}
