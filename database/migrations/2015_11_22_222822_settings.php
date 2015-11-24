<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('settings', function(Blueprint $table)
	    {
		$table->increments('id');
		$table->string('site_name');
		$table->string('site_description');
		$table->string('email');
		$table->string('school_name');
		$table->rememberToken();
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
	Schema::drop('settings');
    }
}
