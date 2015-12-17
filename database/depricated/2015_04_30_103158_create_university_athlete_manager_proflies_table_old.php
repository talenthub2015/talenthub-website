<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityAthleteManagerProfliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

//        //University/College/Club Profile
//        Schema::create('institute_profile',function(Blueprint $table){
//            $table->increments('institute_id')->unsigned();
//            $table->integer('user_id')->unsigned();
//
//            //Defined a foreign key user_id referencing to table users
//            $table->foreign('user_id')
//                ->references('id')->on('users')->onDelete('cascade');
//
//            $table->string('institute_type');
//            $table->string('name');
//            $table->string('email');
//            $table->string('contact_no');
//            $table->string('address_line_1');
//            $table->string('address_line_2');
//            $table->string('city');
//            $table->string('state');
//            $table->string('country');
//            $table->string('zip',10);
//
//
//            $table->boolean('active');
//            $table->timestamps();
//        });
//
//        //Profile for athletes/Parent's Child
//        Schema::create('athlete_sport_profile', function(Blueprint $table)
//        {
//            $table->increments('athlete_profile_id')->unsigned();
//            $table->integer('user_id')->unsigned();
//            //Defined a foreign key user_id referencing to table users
//            $table->foreign('user_id')
//                ->references('id')->on('users')->onDelete('cascade');
//
//            $table->integer('institute_id')->unsigned();
//            $table->foreign('institute_id')->references('institute_id')->on('institute_profile')->onDelete('cascade');
//
//            //Storing the type of profile a user is saving. Profile can be of a soccer, basketball and any other sport player.
//            $table->string('sport_profile');
//            $table->string('playing_position');
//            $table->text('additional_info');
//            $table->text('honours');
//            $table->string('param1');
//            $table->string('param2');
//            $table->string('param3');
//            $table->string('param4');
//            $table->string('param5');
//            $table->string('param6');
//            $table->string('param7');
//            $table->string('param8');
//            $table->string('param9');
//            $table->string('param10');
//
//            $table->boolean('active');
//            $table->timestamps();
//        });
//
//        //Manager/Coach Profile
//        Schema::create('manager_profile',function(Blueprint $table)
//        {
//            $table->increments('coach_profile_id')->unsigned();
//            $table->integer('user_id')->unsigned();
//            //Defined a foreign key user_id referencing to table users
//            $table->foreign('user_id')
//                ->references('id')->on('users')->onDelete('cascade');
//
//            $table->integer('institute_id')->unsigned();
//            //Defined a foreign key user_id referencing to table users
//            $table->foreign('institute_id')
//                ->references('institute_id')->on('institute_profile')->onDelete('cascade');
//
//            //Storing the type of profile a user is saving. Profile can be of a soccer, basketball and any other sport player.
//            $table->string('sport');
//            $table->string('designation');
//            $table->text('responsibilities');
//            $table->text('other_relevant_information');
//            $table->string('param1');
//            $table->string('param2');
//            $table->string('param3');
//            $table->string('param4');
//            $table->string('param5');
//            $table->string('param6');
//            $table->string('param7');
//            $table->string('param8');
//            $table->string('param9');
//            $table->string('param10');
//
//            $table->boolean('active');
//            $table->timestamps();
//        });
//
//
//        //Connections of a User
//        Schema::create('connections',function(Blueprint $table)
//        {
//            $table->integer('user_id')->unsigned();
//            //Defining Foreign Key on user_id on table Users.
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//
//            $table->string('connected_type');
//
//            $table->integer('user_id_connected_to')->unsigned();;
//            //Defining Foreign Key on user_id_connected_to on table Users.
//            $table->foreign('user_id_connected_to')->references('id')->on('users')->onDelete('cascade');
//
//            $table->integer('institute_id_connected_to')->unsigned();
//            //Defining Foreign Key on institute_id_connected_to on table Institute_profile.
//            $table->foreign('institute_id_connected_to')->references('institute_id')->on('institute_profile')->onDelete('cascade');
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//        //Droping Foreign Keys of table Institute Profile
//        Schema::table('institute_profile',function(Blueprint $table)
//        {
//            $table->dropForeign('institute_profile_user_id_foreign');
//        });
//        //Droping Foreign Keys of table athlete_sport_profile
//        Schema::table('athlete_sport_profile',function(Blueprint $table)
//        {
//            $table->dropForeign('athlete_sport_profile_user_id_foreign');
//            $table->dropForeign('athlete_sport_profile_institute_id_foreign');
//        });
//        //Droping Foreign Keys of table manager_profile
//        Schema::table('manager_profile',function(Blueprint $table)
//        {
//            $table->dropForeign('manager_profile_user_id_foreign');
//            $table->dropForeign('manager_profile_institute_id_foreign');
//        });
//        //Droping Foreign Keys of table connections
//        Schema::table('connections',function(Blueprint $table)
//        {
//            $table->dropForeign('connections_user_id_foreign');
//            $table->dropForeign('connections_user_id_connected_to_foreign');
//            $table->dropForeign('connections_institute_id_connected_to_foreign');
//        });
//
//        //Droping Tables Institute Profile, Athlete Profile, Manager Profile and Connections
//        Schema::drop("institute_profile");
//        Schema::drop("athlete_sport_profile");
//        Schema::drop("manager_profile");
//        Schema::drop("connections");
	}

}
