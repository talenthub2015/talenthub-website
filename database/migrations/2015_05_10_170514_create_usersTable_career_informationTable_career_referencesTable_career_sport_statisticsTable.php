<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTableCareerInformationTableCareerReferencesTableCareerSportStatisticsTable extends Migration {

    const CHARACTER_PARAM_LIMIT = 64;

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		 * Create users table
		 */
        Schema::create('users',function(Blueprint $table){
            /*
             * Basic data fields
             */
            $table->increments('user_id')->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('user_type');    //Data can talent, coach, agent and scouts
            $table->string('management_level'); // Depends upon the user_type, refer constants defined in the site
            $table->boolean('active');
            $table->string('remember_token');
            /*
             * Personal Information
             */
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('gender');
            $table->string('height');
            $table->string('weight');
            $table->string('nationality');
            $table->string('mobile_number');
            $table->string('home_number');
            $table->string('address_type');
            $table->string('street_address');
            $table->string('state_province');
            $table->string('zip');
            $table->string('country');
            $table->string('graduation_year');
            $table->string('graduating_from');
            $table->string('ncaa');
            /*
             * Father's information
             */
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_email');
            $table->string('father_mobile_number');
            $table->string('father_alumni');
            $table->string('father_living_with');
            /*
             * Mother's Information
             */
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('mother_email');
            $table->string('mother_mobile');
            $table->string('mother_alumni');
            $table->string('mother_living_with');
            /*
             * Guardian's Information
             */
            $table->string('guardian_name');
            $table->string('guardian_occupation');
            $table->string('guardian_email');
            $table->string('guardian_mobile');
            $table->string('guardian_alumni');
            $table->string('guardian_living_with');
            /*
             * Academic Information
             */
            $table->string('school_type');
            $table->string('school_name');
            $table->string('school_address');
            $table->string('school_city');
            $table->string('school_state_province');
            $table->string('school_zip');
            $table->string('school_country');
            $table->string('school_contact_person_name');
            $table->string('school_contact_person_email');
            $table->string('school_contact_person_phone');

            /*
             * Academic achievements and aspirations
             */

            //$table->string('current_gpa');    //Removed
            $table->string('grade_avg');
            $table->text('academic_achivements');
            $table->string('sat_verbal',self::CHARACTER_PARAM_LIMIT);
            $table->string('sat_math',self::CHARACTER_PARAM_LIMIT);
            $table->string('sat_writing',self::CHARACTER_PARAM_LIMIT);
            $table->string('sat_reading',self::CHARACTER_PARAM_LIMIT);
            $table->string('sat_overall',self::CHARACTER_PARAM_LIMIT);
            $table->string('pact',self::CHARACTER_PARAM_LIMIT);
            $table->string('act',self::CHARACTER_PARAM_LIMIT);
            $table->string('psat',self::CHARACTER_PARAM_LIMIT);
            $table->string('potential_major_category_1');
            $table->string('potential_major_1');
            $table->string('potential_major_category_2');
            $table->string('potential_major_2');
            $table->string('potential_major_category_3');
            $table->string('potential_major_3');

            $table->text('reason_choice_major_1');

            /*
             * Sports/Career profile attributes
             */
            $table->string('sport_type');
            $table->string('positions');
            $table->string('position');
            $table->string('preferred_position');
            $table->string('params');

            /*Managers Career profile attributes*/
            $table->string('almer_mater');
            $table->string('manager_additional_information');
            $table->boolean('verified')->default(0);

            $table->timestamps();

        });


        /*
		 * Create career_information table
         * For storing information about career of a sport athlete, whether he played in club or school
		 */
        Schema::create('career_information',function(Blueprint $table){
            $table->increments('career_id')->unsigned();

            $table->integer('user_id')->unsigned();
            /*
             * Defining foreign key for the user_id
             */
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('career_type');  //Can Club or School, based upon which below elements would be saved and considered
            $table->string('school_type');
            $table->string('club_school_name');
            $table->string('club_school_country');
            $table->string('club_league_name');
            $table->string('club_league_level');
            $table->string('club_season_played');
            $table->string('club_average_league_status');
            $table->string('school_team_reputation');
            $table->string('school_team_side_level');
            $table->string('club_school_most_played_position');
            $table->string('club_school_coach_name');
            $table->string('club_school_coach_email');
            $table->string('club_school_coach_mobile_number');
            $table->string('additional_information');
            $table->timestamp('from_date');
            $table->timestamp('to_date');
            $table->timestamps();
        });

        /*
         * Create career references table
         * This stores information about references for a career row saved by the athlete in career_information table.
         */
        Schema::create('career_references',function(Blueprint $table){
            $table->increments('reference_id')->unsigned();

            $table->integer('career_id')->unsigned();
            /*
             * Defining foreign key for the career_id
             */
            $table->foreign('career_id')
                ->references('career_id')
                ->on('career_information')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('relationship');
            $table->string('occupation');
            $table->string('email');
            $table->string('contact_number');
            $table->timestamps();
        });

        /*
         * Create career sport statistics table
         * This stores information about sports statistics that was played either at club, school or other level.
         * Each entry in the table corresponds to some club or school, stored row in career_information table.
         *
         */
        Schema::create('career_sport_statistics',function(Blueprint $table) {



            $table->increments('statistic_id')->unsigned();

            $table->integer('career_id')->unsigned();
            /*
             * Defining foreign key for the career_id
             */
            $table->foreign('career_id')
                ->references('career_id')
                ->on('career_information')
                ->onDelete('cascade');

            $table->string('statistic_type');
            /*
             * There are the parameter used for storing statistics data for all the sports profile.
             * To see which column corresponds to which sports attribute refer the corresponding sports class as coded.
             */
            $table->string('param1', self::CHARACTER_PARAM_LIMIT);
            $table->string('param2', self::CHARACTER_PARAM_LIMIT);
            $table->string('param3', self::CHARACTER_PARAM_LIMIT);
            $table->string('param4', self::CHARACTER_PARAM_LIMIT);
            $table->string('param5', self::CHARACTER_PARAM_LIMIT);
            $table->string('param6', self::CHARACTER_PARAM_LIMIT);
            $table->string('param7', self::CHARACTER_PARAM_LIMIT);
            $table->string('param8', self::CHARACTER_PARAM_LIMIT);
            $table->string('param9', self::CHARACTER_PARAM_LIMIT);
            $table->string('param10', self::CHARACTER_PARAM_LIMIT);
            $table->string('param11', self::CHARACTER_PARAM_LIMIT);
            $table->string('param12', self::CHARACTER_PARAM_LIMIT);
            $table->string('param13', self::CHARACTER_PARAM_LIMIT);
            $table->string('param14', self::CHARACTER_PARAM_LIMIT);
            $table->string('param15', self::CHARACTER_PARAM_LIMIT);
            $table->string('param16', self::CHARACTER_PARAM_LIMIT);
            $table->string('param17', self::CHARACTER_PARAM_LIMIT);
            $table->string('param18', self::CHARACTER_PARAM_LIMIT);
            $table->string('param19', self::CHARACTER_PARAM_LIMIT);
            $table->string('param20', self::CHARACTER_PARAM_LIMIT);
            $table->string('param21', self::CHARACTER_PARAM_LIMIT);
            $table->string('param22', self::CHARACTER_PARAM_LIMIT);
            $table->string('param23', self::CHARACTER_PARAM_LIMIT);
            $table->string('param24', self::CHARACTER_PARAM_LIMIT);
            $table->string('param25', self::CHARACTER_PARAM_LIMIT);
            $table->string('param26', self::CHARACTER_PARAM_LIMIT);
            $table->string('param27', self::CHARACTER_PARAM_LIMIT);
            $table->string('param28', self::CHARACTER_PARAM_LIMIT);
            $table->string('param29', self::CHARACTER_PARAM_LIMIT);
            $table->string('param30', self::CHARACTER_PARAM_LIMIT);
            $table->string('param31', self::CHARACTER_PARAM_LIMIT);
            $table->string('param32', self::CHARACTER_PARAM_LIMIT);
            $table->string('param33', self::CHARACTER_PARAM_LIMIT);
            $table->string('param34', self::CHARACTER_PARAM_LIMIT);
            $table->string('param35', self::CHARACTER_PARAM_LIMIT);
            $table->string('param36', self::CHARACTER_PARAM_LIMIT);
            $table->string('param37', self::CHARACTER_PARAM_LIMIT);
            $table->string('param38', self::CHARACTER_PARAM_LIMIT);
            $table->string('param39', self::CHARACTER_PARAM_LIMIT);
            $table->string('param40', self::CHARACTER_PARAM_LIMIT);
            $table->string('param41', self::CHARACTER_PARAM_LIMIT);
            $table->string('param42', self::CHARACTER_PARAM_LIMIT);
            $table->string('param43', self::CHARACTER_PARAM_LIMIT);
            $table->string('param44', self::CHARACTER_PARAM_LIMIT);
            $table->string('param45', self::CHARACTER_PARAM_LIMIT);
            $table->string('param46', self::CHARACTER_PARAM_LIMIT);
            $table->string('param47', self::CHARACTER_PARAM_LIMIT);
            $table->string('param48', self::CHARACTER_PARAM_LIMIT);
            $table->string('param49', self::CHARACTER_PARAM_LIMIT);
            $table->string('param50', self::CHARACTER_PARAM_LIMIT);
            $table->string('param51', self::CHARACTER_PARAM_LIMIT);
            $table->string('param52', self::CHARACTER_PARAM_LIMIT);
            $table->string('param53', self::CHARACTER_PARAM_LIMIT);
            $table->string('param54', self::CHARACTER_PARAM_LIMIT);
            $table->string('param55', self::CHARACTER_PARAM_LIMIT);
            $table->string('param56', self::CHARACTER_PARAM_LIMIT);
            $table->string('param57', self::CHARACTER_PARAM_LIMIT);
            $table->string('param58', self::CHARACTER_PARAM_LIMIT);
            $table->string('param59', self::CHARACTER_PARAM_LIMIT);
            $table->string('param60', self::CHARACTER_PARAM_LIMIT);
            $table->string('param61', self::CHARACTER_PARAM_LIMIT);
            $table->string('param62', self::CHARACTER_PARAM_LIMIT);
            $table->string('param63', self::CHARACTER_PARAM_LIMIT);
            $table->string('param64', self::CHARACTER_PARAM_LIMIT);
            $table->string('param65', self::CHARACTER_PARAM_LIMIT);
            $table->string('param66', self::CHARACTER_PARAM_LIMIT);
            $table->string('param67', self::CHARACTER_PARAM_LIMIT);
            $table->string('param68', self::CHARACTER_PARAM_LIMIT);
            $table->string('param69', self::CHARACTER_PARAM_LIMIT);
            $table->string('param70', self::CHARACTER_PARAM_LIMIT);
            $table->string('param71', self::CHARACTER_PARAM_LIMIT);
            $table->string('param72', self::CHARACTER_PARAM_LIMIT);
            $table->string('param73', self::CHARACTER_PARAM_LIMIT);
            $table->string('param74', self::CHARACTER_PARAM_LIMIT);
            $table->string('param75', self::CHARACTER_PARAM_LIMIT);
            $table->string('param76', self::CHARACTER_PARAM_LIMIT);
            $table->string('param77', self::CHARACTER_PARAM_LIMIT);
            $table->string('param78', self::CHARACTER_PARAM_LIMIT);
            $table->string('param79', self::CHARACTER_PARAM_LIMIT);
            $table->string('param80', self::CHARACTER_PARAM_LIMIT);
            $table->string('param81', self::CHARACTER_PARAM_LIMIT);
            $table->string('param82', self::CHARACTER_PARAM_LIMIT);
            $table->string('param83', self::CHARACTER_PARAM_LIMIT);
            $table->string('param84', self::CHARACTER_PARAM_LIMIT);
            $table->string('param85', self::CHARACTER_PARAM_LIMIT);
            $table->string('param86', self::CHARACTER_PARAM_LIMIT);
            $table->string('param87', self::CHARACTER_PARAM_LIMIT);
            $table->string('param88', self::CHARACTER_PARAM_LIMIT);
            $table->string('param89', self::CHARACTER_PARAM_LIMIT);
            $table->string('param90', self::CHARACTER_PARAM_LIMIT);
            $table->string('param91', self::CHARACTER_PARAM_LIMIT);
            $table->string('param92', self::CHARACTER_PARAM_LIMIT);
            $table->string('param93', self::CHARACTER_PARAM_LIMIT);
            $table->string('param94', self::CHARACTER_PARAM_LIMIT);
            $table->string('param95', self::CHARACTER_PARAM_LIMIT);
            $table->string('param96', self::CHARACTER_PARAM_LIMIT);
            $table->string('param97', self::CHARACTER_PARAM_LIMIT);
            $table->string('param98', self::CHARACTER_PARAM_LIMIT);
            $table->string('param99', self::CHARACTER_PARAM_LIMIT);
            $table->string('param100', self::CHARACTER_PARAM_LIMIT);
            $table->string('param101', self::CHARACTER_PARAM_LIMIT);
            $table->string('param102', self::CHARACTER_PARAM_LIMIT);
            $table->string('param103', self::CHARACTER_PARAM_LIMIT);
            $table->string('param104', self::CHARACTER_PARAM_LIMIT);
            $table->string('param105', self::CHARACTER_PARAM_LIMIT);
            $table->string('param106', self::CHARACTER_PARAM_LIMIT);
            $table->string('param107', self::CHARACTER_PARAM_LIMIT);
            $table->string('param108', self::CHARACTER_PARAM_LIMIT);
            $table->string('param109', self::CHARACTER_PARAM_LIMIT);
            $table->string('param110', self::CHARACTER_PARAM_LIMIT);
            $table->string('param111', self::CHARACTER_PARAM_LIMIT);
            $table->string('param112', self::CHARACTER_PARAM_LIMIT);
            $table->string('param113', self::CHARACTER_PARAM_LIMIT);
            $table->string('param114', self::CHARACTER_PARAM_LIMIT);
            $table->string('param115', self::CHARACTER_PARAM_LIMIT);
            $table->string('param116', self::CHARACTER_PARAM_LIMIT);
            $table->string('param117', self::CHARACTER_PARAM_LIMIT);
            $table->string('param118', self::CHARACTER_PARAM_LIMIT);
            $table->string('param119', self::CHARACTER_PARAM_LIMIT);
            $table->string('param120', self::CHARACTER_PARAM_LIMIT);
            $table->string('param121', self::CHARACTER_PARAM_LIMIT);
            $table->string('param122', self::CHARACTER_PARAM_LIMIT);
            $table->string('param123', self::CHARACTER_PARAM_LIMIT);
            $table->string('param124', self::CHARACTER_PARAM_LIMIT);
            $table->string('param125', self::CHARACTER_PARAM_LIMIT);
            $table->string('param126', self::CHARACTER_PARAM_LIMIT);
            $table->string('param127', self::CHARACTER_PARAM_LIMIT);
            $table->string('param128', self::CHARACTER_PARAM_LIMIT);
            $table->string('param129', self::CHARACTER_PARAM_LIMIT);
            $table->string('param130', self::CHARACTER_PARAM_LIMIT);
            $table->string('param131', self::CHARACTER_PARAM_LIMIT);
            $table->string('param132', self::CHARACTER_PARAM_LIMIT);
            $table->string('param133', self::CHARACTER_PARAM_LIMIT);
            $table->string('param134', self::CHARACTER_PARAM_LIMIT);
            $table->string('param135', self::CHARACTER_PARAM_LIMIT);
            $table->string('param136', self::CHARACTER_PARAM_LIMIT);
            $table->string('param137', self::CHARACTER_PARAM_LIMIT);
            $table->string('param138', self::CHARACTER_PARAM_LIMIT);
            $table->string('param139', self::CHARACTER_PARAM_LIMIT);
            $table->string('param140', self::CHARACTER_PARAM_LIMIT);

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
         * Removing foreign key(s) set on career_sport_statistics.
         * After that deleting the table
         */
		Schema::table('career_sport_statistics',function(Blueprint $table){
            $table->dropForeign('career_sport_statistics_career_id_foreign');
        });
        Schema::drop('career_sport_statistics');

        /*
         * Removing foreign key(s) set on career_references.
         * After that deleting the table
         */
        Schema::table('career_references',function(Blueprint $table){
            $table->dropForeign('career_references_career_id_foreign');
        });
        Schema::drop('career_references');

        /*
         * Removing foreign key(s) set on career_information.
         * After that deleting the table
         */
        Schema::table('career_information',function(Blueprint $table){
            $table->dropForeign('career_information_user_id_foreign');
        });
        Schema::drop('career_information');

        /*
         * Deleting the users table
         */
        Schema::drop('users');
	}

}
