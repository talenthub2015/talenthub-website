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
//    const USER_TALENT_STUDENT = 100;
//    const USER_TALENT_ASPIRING_PROFESSIONAL = 101;
//    const USER_TALENT_STUDENT_ASPIRING_PROFESSIONAL = 102;
//    const USER_TALENT_PARENT = 200;
//    const USER_MANAGER_COACH_SCHOOL = 300;
//    const USER_MANAGER_COACH_UNIVERSITY = 301;
//    const USER_MANAGER_COACH_AMATEUR = 302;
//    const USER_MANAGER_COACH_SEMI_PRO = 303;
//    const USER_MANAGER_COACH_PROFESSIONAL = 304;
//    const USER_MANAGER_AGENT_PROFESSIONAL = 310;
//    const USER_MANAGER_AGENT_SEMI_PRO = 311;
//    const USER_MANAGER_AGENT_AMATEUR = 312;
//    const USER_MANAGER_SCOUT_PROFESSIONAL = 320;
//    const USER_MANAGER_SCOUT_SEMI_PRO = 321;
//    const USER_MANAGER_SCOUT_AMATEUR = 322;

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

}