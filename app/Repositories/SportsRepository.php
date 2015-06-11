<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 16-05-2015
 * Time: 01:26
 */

namespace talenthub\Repositories;


class SportsRepository {

    const BASEBALL = 'Base Ball';
    const BASKETBALL = 'Basket Ball';
    const FOOTBALL = 'Football';
    const RUGBY = 'Rugby';
    const SOCCER = 'Soccer';
    const SWIMMING = 'Swimming';
    const TENNIS = 'Tennis';
    const TRACK_FIELD = 'Track and Field';
    const SOFTBALL = 'Soft Ball';
    const WATERPOLO = 'Water Polo';

    public static $sports_positions=array(
        self::BASEBALL => array("batting","fielding"),
        self::BASKETBALL => array("point guard","shooting guard","small forward","power forward","center"),
        self::FOOTBALL => array("batting","fielding"),
        self::RUGBY => array("forward","backline","kicker"),
        self::SOCCER => array("goalkeeper","defender","midfielder","forward"),
        self::SWIMMING => array("Breast Stroke","Butterfly","Back Stroke","Free Style","Diving"),
        self::TENNIS => array("",""),
        self::TRACK_FIELD => array("class1","class2"),
        self::SOFTBALL => array("",""),
        self::WATERPOLO => array("","")
    );


    /**
     * Get the sports positions with respect to sport type provided as a parameter
     * @param $sport_type
     * @return mixed
     */
    public static function getSportPositions($sport_type)
    {
        return self::$sports_positions[$sport_type];
    }


    /**
     *Getting the league Level options used in the site with corresponding indexes.
     */
    public static function getClubLeagueLevel()
    {
        return array(
            0=>'-- Select Option --',
            1=>'Professional',
            2=>'Semi - Professional',
            3=>'Amateur'
        );
    }

    /**
     *Getting the league Status options used in the site with corresponding indexes.
     */
    public static function getClubLeagueStatus()
    {
        return array(
            0=>'-- Select Option --',
            1=>'League Winner',
            2=>'League Contenders',
            3=>'Middle of the League',
            4=>'Relegation Fighters'
        );
    }

    /**
     *Getting the School Team Reputation options used in the site with corresponding indexes.
     */
    public static function getSchoolTeamReputation()
    {
        return array(
            0=>'-- Select Option --',
            1=>'Popular for my sport',
            2=>'Fairly Popular for my sport',
            3=>'Not Popular for my sport'
        );
    }

    /**
     *Getting the School Team Side Level options used in the site with corresponding indexes.
     */
    public static function getSchoolTeamSideLevel()
    {
        return array(
            0=>'-- Select Option --',
            1=>'1st Team',
            2=>'2nd Team',
            3=>'Open-age group',
            4=>'High age-group team',
            5=>'Low age-group team'
        );
    }


    /**
     * Generate the data map for a club by prefixing "club" with each attribute
     * @param $dataMap
     */
    public static function getClubDataMap($dataMap,$withSquareBracket=false)
    {
        foreach($dataMap as $key=>$value)
        {
            if($withSquareBracket==true)
            {
                $dataMap[$key]="club_".$value."[][]";
            }
            else
            {
                $dataMap[$key]="club_".$value;
            }
        }
        return $dataMap;
    }

    /**
     * Generate the data map for a school by prefixing "school" with each attribute
     * @param $dataMap
     */
    public static function getSchoolDataMap($dataMap,$withSquareBracket=false)
    {
        foreach($dataMap as $key=>$value)
        {
            if($withSquareBracket==true)
            {
                $dataMap[$key]="school_".$value."[][]";
            }
            else
            {
                $dataMap[$key]="school_".$value;
            }
        }
        return $dataMap;
    }


    /**
     *Function has the array of User Profile extra parameters asked such as dominant hand, speed 40m, speed 100m, bench press, etc.
     */
    public static function getExtraParamsKeysUserProfile()
    {
        return [
            'dominant_hand'=>'dominant_hand',
            'dominant_foot'=>'dominant_foot',
            'speed_40'=>'speed_40',
            'speed_100'=>'speed_100',
            'bench_press'=>'bench_press'
        ];
    }





    /**
     *Returns the Type of genders a sport can consists.
     * @return array
     */
    public static function getSportsGender()
    {
        return [
            '1'=>'Male',
            '2'=>'Female'
        ];
    }

}