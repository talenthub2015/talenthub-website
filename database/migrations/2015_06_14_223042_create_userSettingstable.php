<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingstable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_settings',function(Blueprint $table){
            $table->increments("id")->unsigned();
            $table->integer("user_id")->unsigned();
            //Foreign Key to user's user_id
            $table->foreign("user_id")->references("user_id")->on("users")->onDelete("cascade");

            $table->string("setting_type");
            $table->string("setting_value");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("user_settings",function(Blueprint $table){
            $table->dropForeign("user_settings_user_id_foreign");
        });

        Schema::drop("user_settings");
	}

}
