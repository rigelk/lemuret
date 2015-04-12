<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('promos', function(Blueprint $table)
	    {
		$table->integer('id');
		$table->integer('year');
		// $table->binary('promo_image'); // binary = BLOB or on a besoin de plus gros (voir la raw query (statement) plus bas)
		$table->primary(['id','year']);
	    });
	DB::statement("ALTER TABLE `promos` ADD `promo_image` MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::drop('promos');
    }

}
