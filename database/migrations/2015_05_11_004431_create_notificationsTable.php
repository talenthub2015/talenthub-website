<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*
         * Create notification table
         */
        Schema::create('notifications',function(Blueprint $table){

            /*
             * Setting up foreign key of notification_to
             */
            $table->integer('notification_to')->unsigned();
            $table->foreign('notification_to')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of notification_from
             */
            $table->integer('notification_from')->unsigned();
            $table->foreign('notification_from')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('notification_type');

            /*
             * Setting up foreign key of post_id
             */
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');

            $table->timestamp('notification_on');
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
        /*
         * Removing foreign key(s) set on notifications.
         * After that deleting the table
         */
        Schema::table('notifications',function(Blueprint $table){
            $table->dropForeign('notifications_notification_to_foreign');
            $table->dropForeign('notifications_notification_from_foreign');
            $table->dropForeign('notifications_post_id_foreign');
        });
        Schema::drop('notifications');
	}

}
