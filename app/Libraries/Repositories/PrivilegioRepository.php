<?php

namespace App\Libraries\Repositories;


use App\Models\Privilegio;
use Illuminate\Support\Facades\Schema;

class PrivilegioRepository
{

	/**
	 * Returns all Privilegios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Privilegio::all();
	}

	public function search($input)
    {
        $query = Privilegio::query();

        $columns = Schema::getColumnListing('privilegios');
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
	 * Stores Privilegio into database
	 *
	 * @param array $input
	 *
	 * @return Privilegio
	 */
	public function store($input)
	{
		return Privilegio::create($input);
	}

	/**
	 * Find Privilegio by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Privilegio
	 */
	public function findPrivilegioById($id)
	{
		return Privilegio::find($id);
	}

	/**
	 * Updates Privilegio into database
	 *
	 * @param Privilegio $privilegio
	 * @param array $input
	 *
	 * @return Privilegio
	 */
	public function update($privilegio, $input)
	{
		$privilegio->fill($input);
		$privilegio->save();

		return $privilegio;
	}
}