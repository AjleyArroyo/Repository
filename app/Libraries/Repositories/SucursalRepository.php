<?php

namespace App\Libraries\Repositories;


use App\Models\Sucursal;
use Illuminate\Support\Facades\Schema;

class SucursalRepository
{

	/**
	 * Returns all Sucursals
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Sucursal::all();
	}

	public function search($input)
    {
        $query = Sucursal::query();

        $columns = Schema::getColumnListing('sucursals');
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
	 * Stores Sucursal into database
	 *
	 * @param array $input
	 *
	 * @return Sucursal
	 */
	public function store($input)
	{
		return Sucursal::create($input);
	}

	/**
	 * Find Sucursal by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Sucursal
	 */
	public function findSucursalById($id)
	{
		return Sucursal::find($id);
	}

	/**
	 * Updates Sucursal into database
	 *
	 * @param Sucursal $sucursal
	 * @param array $input
	 *
	 * @return Sucursal
	 */
	public function update($sucursal, $input)
	{
		$sucursal->fill($input);
		$sucursal->save();

		return $sucursal;
	}
}