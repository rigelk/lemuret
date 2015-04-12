ç<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('user_info', function(Blueprint $table)
	    {
		$table->increments('iduser_info');
		$table->string('info_lieu');
		$table->string('info_gps');
		$table->string('info_poste');
		$table->string('info_promo');
		$table->string('info_promo_type');
	    });
	DB::statement("ALTER TABLE `user_info` ADD `info_image` MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::drop('user_info');
    }

}
