<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdatingManagersContactedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('managers_contacted',function(Blueprint $table){
            $table->text('message_to_manager')->after("manager_id");
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
            $table->dropColumn('message_to_manager');
        });
	}

}
