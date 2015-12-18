<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerCareerHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('manager_career_information',function(Blueprint $table) {
            /*
             * Basic data fields
             */
            $table->increments('manager_career_id')->unsigned();

            $table->integer('user_id')->unsigned();
            /*
             * Defining foreign key for the user_id
             */
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('company');
            $table->string('industry');
            $table->string('career_country');    //Data can talent, coach, agent and scouts
            $table->string('position_held'); // Depends upon the user_type, refer constants defined in the site
            $table->text('duties');
            $table->timestamp('from_date');
            $table->timestamp('to_date');
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
        Schema::table('manager_career_information',function(Blueprint $table){
            $table->dropForeign('manager_career_information_user_id_foreign');
        });
        Schema::drop('manager_career_information');
	}

}
