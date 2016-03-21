<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCareerHistoryCareerAchievement extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //Create manager_career_history table
		Schema::create('manager_career_history',function($table){
            $table->increments('id')->unsigned();

            //Foreign Key 'manager_profile_id' on Users table
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('profile_id')->on('manager_profile')->onDelete('cascade');

            $table->string('career_year');
            $table->timestamps();
        });

        //Create manager_career_history_achievement table
        Schema::create('manager_career_history_achievement',function($table){
            $table->increments('id')->unsigned();

            //Foreign Key 'manager_profile_id' on Users table
            $table->integer('career_history_id')->unsigned();
            $table->foreign('career_history_id')->references('id')->on('manager_career_history')->onDelete('cascade');

            $table->string('achievement');
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
        //Removing Foreign Key
        Schema::table('manager_career_history_achievement',function($table){
            $table->dropForeign('manager_career_history_achievement_career_history_id_foreign');
        });

        Schema::drop('manager_career_history_achievement');

        //Removing Foreign Key
        Schema::table('manager_career_history',function($table){
            $table->dropForeign('manager_career_history_career_profile_id_foreign');
        });

        Schema::drop('manager_career_history');
	}

}
