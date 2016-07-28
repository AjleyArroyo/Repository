<?php

namespace App\Libraries\Repositories;


use App\Models\Usuario;
use Illuminate\Support\Facades\Schema;

class UsuarioRepository
{

	/**
	 * Returns all Usuarios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Usuario::all();
	}

	public function search($input)
    {
        $query = Usuario::query();

        $columns = Schema::getColumnListing('usuarios');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Usuario into database
	 *
	 * @param array $input
	 *
	 * @return Usuario
	 */
	public function store($input)
	{
		return Usuario::create($input);
	}

	/**
	 * Find Usuario by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Usuario
	 */
	public function findUsuarioById($id)
	{
		return Usuario::find($id);
	}

	/**
	 * Updates Usuario into database
	 *
	 * @param Usuario $usuario
	 * @param array $input
	 *
	 * @return Usuario
	 */
	public function update($usuario, $input)
	{
		$usuario->fill($input);
		$usuario->save();

		return $usuario;
	}
}