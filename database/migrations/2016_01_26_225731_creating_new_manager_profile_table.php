<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatingNewManagerProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manager_profile',function($table){
            $table->increments('profile_id')->unsigned();

            //Foreign Key 'User_id' on Users table
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('gender',100);
            $table->string('nationality');
            $table->string('mobile_number');
            $table->string('home_number');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip',10);
            $table->string('country');
            $table->string('bio');
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
        Schema::table('manager_profile',function($table){
            $table->dropForeign('manager_profile_user_id_foreign');
        });

        Schema::drop('manager_profile');
	}

}
