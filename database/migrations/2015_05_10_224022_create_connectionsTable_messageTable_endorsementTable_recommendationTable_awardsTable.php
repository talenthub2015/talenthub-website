<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTableMessageTableEndorsementTableRecommendationTableAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		 * Create connections table
		 */
        Schema::create('connections',function(Blueprint $table){
            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of connected_to to user_id of user
             */
            $table->integer('connected_to')->unsigned();
            $table->foreign('connected_to')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('status');
            $table->timestamps();
        });

        /*
		 * Create message table
		 */
        Schema::create('messages',function(Blueprint $table){

            $table->increments('message_id')->unsigned();
            /*
             * Setting up foreign key of user_id to users table
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of to_user_id to user_id of user
             */
            $table->integer('to_user_id')->unsigned();
            $table->foreign('to_user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('subject');
            $table->text('message');
            $table->timestamp('sent_on');
            $table->timestamps();
        });

        /*
		 * Create endorsement table
         * It is a Pivot table
		 */
        Schema::create('endorsements',function(Blueprint $table){
            /*
             * Setting up foreign key of user_id to users table
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of to_user_id to user_id of user
             */
            $table->integer('endorsement_by')->unsigned();
            $table->foreign('endorsement_by')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('endorsed_on');
            $table->timestamps();
        });

        /*
		 * Create recommendations table
		 */
        Schema::create('recommendations',function(Blueprint $table){
            $table->increments('recommendation_id')->unsigned();
            /*
             * Setting up foreign key of user_id to users table
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('recommender_type'); //Whether recommender is a coach or a talent
            $table->string('status');   //Status can be waiting or complete
            $table->string('name');
            $table->string('email');
            $table->string('organisation');
            $table->string('position');
            $table->string('athletic_ability',32);
            $table->string('leadership',32);
            $table->string('team_player',32);
            $table->string('easy_to_work',32);
            $table->text('comment_athletic_ability');
            $table->text('comment_player_personality');
            $table->timestamps();
        });

        /*
		 * Create Awards table
		 */
        Schema::create('awards',function(Blueprint $table){
            $table->increments('award_id')->unsigned();
            /*
             * Setting up foreign key of user_id to users table
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('award_details');
            //$table->string('award_date');
            //$table->text('award_by');
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
         * Removing foreign key(s) set on awards.
         * After that deleting the table
         */
        Schema::table('awards',function(Blueprint $table){
            $table->dropForeign('awards_user_id_foreign');
        });
        Schema::drop('awards');

        /*
         * Removing foreign key(s) set on recommendations.
         * After that deleting the table
         */
        Schema::table('recommendations',function(Blueprint $table){
            $table->dropForeign('recommendations_user_id_foreign');
        });
        Schema::drop('recommendations');

        /*
         * Removing foreign key(s) set on endorsements.
         * After that deleting the table
         */
        Schema::table('endorsements',function(Blueprint $table){
            $table->dropForeign('endorsements_user_id_foreign');
            $table->dropForeign('endorsements_endorsement_by_foreign');
        });
        Schema::drop('endorsements');


        /*
         * Removing foreign key(s) set on endorsements.
         * After that deleting the table
         */
        Schema::table('messages',function(Blueprint $table){
            $table->dropForeign('messages_user_id_foreign');
            $table->dropForeign('messages_to_user_id_foreign');
        });
        Schema::drop('messages');

        /*
         * Removing foreign key(s) set on endorsements.
         * After that deleting the table
         */
        Schema::table('connections',function(Blueprint $table){
            $table->dropForeign('connections_user_id_foreign');
            $table->dropForeign('connections_connected_to_foreign');
        });
        Schema::drop('connections');
	}

}
