<?php

namespace App\Libraries\Repositories;


use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Schema;

class TipoUsuarioRepository
{

	/**
	 * Returns all TipoUsuarios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return TipoUsuario::all();
	}

	public function search($input)
    {
        $query = TipoUsuario::query();

        $columns = Schema::getColumnListing('tipo_usuarios');
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
	 * Stores TipoUsuario into database
	 *
	 * @param array $input
	 *
	 * @return TipoUsuario
	 */
	public function store($input)
	{
		return TipoUsuario::create($input);
	}

	/**
	 * Find TipoUsuario by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|TipoUsuario
	 */
	public function findTipoUsuarioById($id)
	{
		return TipoUsuario::find($id);
	}

	/**
	 * Updates TipoUsuario into database
	 *
	 * @param TipoUsuario $tipoUsuario
	 * @param array $input
	 *
	 * @return TipoUsuario
	 */
	public function update($tipoUsuario, $input)
	{
		$tipoUsuario->fill($input);
		$tipoUsuario->save();

		return $tipoUsuario;
	}
}