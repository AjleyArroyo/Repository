<?php

namespace App\Libraries\Repositories;


use App\Models\Catalogo;
use Illuminate\Support\Facades\Schema;

class CatalogoRepository
{

	/**
	 * Returns all Catalogos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Catalogo::all();
	}

	public function search($input)
    {
        $query = Catalogo::query();

        $columns = Schema::getColumnListing('catalogos');
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
	 * Stores Catalogo into database
	 *
	 * @param array $input
	 *
	 * @return Catalogo
	 */
	public function store($input)
	{
		return Catalogo::create($input);
	}

	/**
	 * Find Catalogo by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Catalogo
	 */
	public function findCatalogoById($id)
	{
		return Catalogo::find($id);
	}

	/**
	 * Updates Catalogo into database
	 *
	 * @param Catalogo $catalogo
	 * @param array $input
	 *
	 * @return Catalogo
	 */
	public function update($catalogo, $input)
	{
		$catalogo->fill($input);
		$catalogo->save();

		return $catalogo;
	}
}