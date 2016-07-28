<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCatalogosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalle_catalogos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idCatalogo')->unsigned();
			$table->integer('idMueble')->unsigned();
			$table->foreign('idCatalogo')
				->references('id')->on('catalogos')->onDelete('cascade');
			$table->foreign('idMueble')
				->references('id')->on('muebles')->onDelete('cascade');
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
		Schema::drop('detalle_catalogos');
	}

}
