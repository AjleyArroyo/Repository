<?php

namespace App\Libraries\Repositories;


use App\Models\Mueble;
use Illuminate\Support\Facades\Schema;

class MuebleRepository
{

	/**
	 * Returns all Muebles
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Mueble::all();
	}

	public function search($input)
    {
        $query = Mueble::query();

        $columns = Schema::getColumnListing('muebles');
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
	 * Stores Mueble into database
	 *
	 * @param array $input
	 *
	 * @return Mueble
	 */
	public function store($input)
	{
		return Mueble::create($input);
	}

	/**
	 * Find Mueble by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Mueble
	 */
	public function findMuebleById($id)
	{
		return Mueble::find($id);
	}

	/**
	 * Updates Mueble into database
	 *
	 * @param Mueble $mueble
	 * @param array $input
	 *
	 * @return Mueble
	 */
	public function update($mueble, $input)
	{
		$mueble->fill($input);
		$mueble->save();

		return $mueble;
	}
}