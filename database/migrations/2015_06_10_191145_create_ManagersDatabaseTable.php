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
            $table->string('institution_name');
            $table->timestamps();

        });

        Schema::create('managers_contacted',function(Blueprint $table){
            $table->integer('user_id')->unsigned();

            //Delete on cascade
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('manager_id')->unsigned();

            //Delete on cascade
            $table->foreign('manager_id')
                ->references('id')
                ->on('managers_database')
                ->onDelete('cascade');


            $table->timestamp('contacted_on');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('managers_contacted',function(Blueprint $table){
            $table->dropForeign('managers_contacted_user_id_foreign');
            $table->dropForeign('managers_contacted_manager_id_foreign');
        });
        Schema::drop('managers_contacted');

		Schema::drop('managers_database');
	}

}
