<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 14-05-2015
 * Time: 16:04
 */

namespace talenthub\Repositories;


class SiteConstants {

    /*
     * User Types of the site
     */
    const USER_TALENT="talent";
    const USER_MANAGER="manager";

    const USER_MANAGER_COACH="coach";
    const USER_MANAGER_AGENT="agent";
    const USER_MANAGER_SCOUT="scout";
    const USER_PARENT="parent";

    /*Management LEVEL for talent*/
    const USER_TALENT_MANAGEMENT_LEVEL_STUDENT = "student";
    const USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO = "aspiring professional";
    const USER_TALENT_MANAGEMENT_LEVEL_STUDENT_ASPIRING_PRO = "student and aspiring professional";

    /*Management LEVEL for Manager*/
    const USER_MANAGER_MANAGEMENT_LEVEL_PRO = "professional";
    const USER_MANAGER_MANAGEMENT_LEVEL_SEMI_PRO = "semi-professional";
    const USER_MANAGER_MANAGEMENT_LEVEL_AMATEUR = "amateur";
    const USER_MANAGER_MANAGEMENT_LEVEL_UNIVERSITY = "university";
    const USER_MANAGER_MANAGEMENT_LEVEL_HIGH_SCHOOL = "high school";



    //Career Information Type Constants
    const CAREER_TYPE_CLUB = "club";
    const CAREER_TYPE_SCHOOL = "school";



    //============== Requesting Recommendation ===================//
    //Talent Recommendation - Recommender Type
    const RECOMMENDER_COACH = "coach";
    const RECOMMENDER_ATHLETE = "athlete";

    //Talent Recommendation Status
    const RECOMMENDATION_STATUS_WAITING = "recommendation_waiting";
    const RECOMMENDATION_STATUS_COMPLETE = "recommendation_complete";

    //-------------- Requesting Recommendation ------------//




    //////////////////////////////////////////////////////////////////////////////////////
    ////////////////////            User Functions             ///////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    /**
     * Checks if a user is talent or not, talent include STUDENT, ASPIRING PROFESSIONAL, BOTH and PARENT of talent
     * @param $user_id
     */
    public static function isTalent($user_type)
    {
        if(in_array($user_type,array(self::USER_TALENT)))
        {
            return true;
        }
        return false;
    }

    /**
     * Checks if a user is a Manager, Manager includes user type of coach, agent and scout
     * @param $user_type
     */
    public static function isManager($user_type)
    {
        if(in_array($user_type,array(self::USER_MANAGER_COACH,self::USER_MANAGER_AGENT, self::USER_MANAGER_SCOUT)))
        {
            return true;
        }
        return false;
    }

    /**
     * Checks if a user is coach or not, coach includes coach
     * @param $user_type
     */
    public static function isCoach($user_type)
    {
        if(in_array($user_type,array(self::USER_MANAGER_COACH)))
        {
            return true;
        }
        return false;
    }

    /**
     * Checks if a user is AGENT or not, AGENT includes AGENT
     * @param $user_type
     */
    public static function isAgent($user_type)
    {
        if(in_array($user_type,array(self::USER_MANAGER_AGENT)))
        {
            return true;
        }
        return false;
    }

    /**
     * Checks if a user is scout or not, scout includes scout
     * @param $user_type
     */
    public static function isScout($user_type)
    {
        if(in_array($user_type,array(self::USER_MANAGER_SCOUT)))
        {
            return true;
        }
        return false;
    }




    //////////////////////////////////////////////////////////////////////////////////////
    ////////////////////        Recommendation Functions       ///////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    /**
     *Getting recommender type
     */
    public static function getRecommenderType()
    {
        return [
            0=>"-- Select Option --",
            self::RECOMMENDER_COACH => self::RECOMMENDER_COACH,
            self::RECOMMENDER_ATHLETE => self::RECOMMENDER_ATHLETE
        ];
    }



}