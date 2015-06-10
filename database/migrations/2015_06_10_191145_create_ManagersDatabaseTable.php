<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateManagersDatabaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('managers_database',function(Blueprint $table) {
            /*
             * Basic data fields
             */
            $table->increments('id')->unsigned();

            $table->string('manager_type');         //Can be Agent, Scout, Coach
            $table->string('management_level');     //Can be at various management level.

            $table->string('sport_type');
            $table->string('sport_gender');
            $table->string('designation');
            $table->string('coach_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('country');
            $table->string('state');
            $table->string('institution_type');
            $table->string('institution_name');
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
		Schema::drop('managers_database');
	}

}
