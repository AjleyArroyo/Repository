<?php

namespace App\Libraries\Repositories;


use App\Models\Ubicacion;
use Illuminate\Support\Facades\Schema;

class UbicacionRepository
{

	/**
	 * Returns all Ubicacions
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Ubicacion::all();
	}

	public function search($input)
    {
        $query = Ubicacion::query();

        $columns = Schema::getColumnListing('ubicacions');
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
	 * Stores Ubicacion into database
	 *
	 * @param array $input
	 *
	 * @return Ubicacion
	 */
	public function store($input)
	{
		return Ubicacion::create($input);
	}

	/**
	 * Find Ubicacion by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Ubicacion
	 */
	public function findUbicacionById($id)
	{
		return Ubicacion::find($id);
	}

	/**
	 * Updates Ubicacion into database
	 *
	 * @param Ubicacion $ubicacion
	 * @param array $input
	 *
	 * @return Ubicacion
	 */
	public function update($ubicacion, $input)
	{
		$ubicacion->fill($input);
		$ubicacion->save();

		return $ubicacion;
	}
}