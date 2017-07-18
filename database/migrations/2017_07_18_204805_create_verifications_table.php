<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('verifications', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('managerProfileId')->unsigned();
			$table->foreign('managerProfileId')
                ->references('profile_id')->on('manager_profile')
                ->onDelete('cascade');

			$table->boolean('verificationStatus')->default(false);
            $table->string('club')->nullable();
            $table->string('clubCountry')->nullable();
            $table->string('league')->nullable();
            $table->string('leagueWebsite')->nullable();
            $table->string('clubWebsite')->nullable();
            $table->string('roleAtClub')->nullable();
            $table->string('agentLicenceNumber')->nullable();
            $table->date('issuedDate')->nullable();
            $table->date('expiryDate')->nullable();
			$table->timestamps();
		});

        Schema::create('verificationFiles', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('verificationRequestId')->unsigned();
            $table->foreign('verificationRequestId')
                ->references('id')->on('verifications')
                ->onDelete('cascade');

            $table->string('fullFileName');
            $table->string('fileRelativeLocation');
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
        Schema::table('verificationFiles', function($table){
            $table->dropForeign('verificationFiles_verificationrequestid_foreign');
        });
        Schema::drop('verificationFiles');

	    Schema::table('verifications', function($table){
	        $table->dropForeign('verifications_managerprofileid_foreign');
        });
		Schema::drop('verifications');
	}

}
