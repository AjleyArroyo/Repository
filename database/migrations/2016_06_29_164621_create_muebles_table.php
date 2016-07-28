<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMueblesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('muebles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->String('nombre',50);
			$table->String('descripcion',50);
			$table->String('color',30);
			$table->String('nombreImagen',30);
			$table->integer('idCategoria')->unsigned();
			$table->foreign('idCategoria')
				->references('id')->on('categorias')
				->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('muebles');
	}

}
