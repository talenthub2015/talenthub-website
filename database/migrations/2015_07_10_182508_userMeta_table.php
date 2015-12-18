<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UserMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_meta',function(Blueprint $table){
            $table->increments("id");
            $table->integer('user_id')->unsigned();

            $table->foreign("user_id")->references("user_id")->on('users')->onDelete('cascade');

            $table->string('meta_type');
            $table->string('meta_value');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_meta',function(Blueprint $table){
            $table->dropForeign('user_meta_user_id_foreign');
        });

        Schema::drop('user_meta');
	}

}
