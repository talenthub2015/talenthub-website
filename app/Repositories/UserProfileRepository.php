<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 12-05-2015
 * Time: 20:52
 */

namespace talenthub\Repositories;


class UserProfileRepository {


    /**
     * Defining Gender of users accepted by the system
     *
     * @return array of gender types
     */
    public static function getUserGender()
    {
        return array(
            0=>"--Select Gender--",
            1=>"Male",
            2=>"Female",
            3=>"Other"
        );
    }


    /**
     * Defining Address Types for a user accepted by the system and stored in the database
     *
     * @return array of Address types
     */
    public static function getAddressTypes()
    {
        return array(
            0=>"-- Select Address Type --",
            1=>"Home",
            2=>"Campus",
            3=>"Billing",
            4=>"Mailing",
            5=>"Shipping"
        );
    }

    /**
     * Defining Graduation Types for a user accepted by the system and stored in the database
     *
     * @return array of Graduation types
     */
    public static function getInstituteType()
    {
        return array(
            0=>'-- Select Graduation Type --',
            1=>'High School',
            2=>'University'
        );
    }

    /**
     * Defining Living with type for a user accepted by the system and stored in the database
     *
     * @return array of Living with type
     */
    public static function getLivingWithType()
    {
        return array(
            0=>'-- Select Option --',
            1=>'Yes',
            2=>'No'
        );
    }


    /**
     * Defining Grade average type for a user accepted by the system and stored in the database
     *
     * @return array of Grade Average type in % range
     */
    public static function getGradeAverageType()
    {
        return array(
            0=>'-- Select Option --',
            1=>'+90%',
            2=>'80-85%',
            3=>'75-80%',
            4=>'70-75%',
            5=>'65-70%',
            6=>'60-65%',
            7=>'55-60%',
            8=>'50-55%',
            9=>'45-50%',
            10=>'40-45%',
            11=>'Below 40%',
        );
    }


    /**
     * Defining Major Choices for a user accepted by the system and stored in the database
     *
     * @return array of Major Choices
     */
    public static function getMajorChoices()
    {
        return array(
            0=>"-- Select Major --",
            1=>"Agricultural Business and Production",
            2=>"Agriculture/Agricultural Sciences",
            3=>"Architecture and Related Programs",
            4=>"Area, Ethnic and Cultural Studies",
            5=>"Arts - Visual and Performing",
            6=>"Basic Skills",
            7=>"Biological Sciences/Life Sciences",
            8=>"Business Mgmt and Admin. Services",
            9=>"Citizenship Activities",
            10=>"Communications",
            11=>"Computer and Information Sciences",
            12=>"Conservation and Renew. Nat. Resources",
            13=>"Construction Trades",
            14=>"Dental, Medical And Veterinary Residency Programs",
            15=>"Education",
            16=>"Educational/Instruc. Media Tech./Technician",
            17=>"Engineering",
            18=>"Engineering-Rel. Technol./Technician",
            19=>"English Language and Lit./Letters",
            20=>"Foreign Languages and Literatures",
            21=>"Health Professions and Related Sciences",
            22=>"Health-Related Knowledge and Skills",
            23=>"High School/Secondary Diplomas and Certificates",
            24=>"History",
            25=>"Home Economics",
            26=>"Interpersonal and Social Skills",
            27=>"Law and Legal Studies",
            28=>"Leisure and Recreational Activities",
            29=>"Lib. Art and Sciences, Gen. Studies and Humanities",
            30=>"Library Science",
            31=>"Marketing Ops./Marketing and Distrib.</option",
            32=>"Mathematics",
            33=>"Mechanics and Repairers",
            34=>"Military Studies",
            35=>"Military Technologies",
            36=>"Multi/Interdisciplinary Studies",
            37=>"Parks, Rec., Leisure, and Fitness Studies",
            38=>"Personal and Miscellaneous Services",
            39=>"Personal Awareness and Self-Improvement",
            40=>"Philosophy and Religion",
            41=>"Physical Sciences",
            42=>"Precision Production Trades",
            43=>"Protective Services",
            44=>"Psychology",
            45=>"Public Administration and Services",
            46=>"Science Technol./Technicians",
            47=>"Social Sciences and History",
            48=>"Theological Studies and Religious Vocations",
            49=>"Transport. and Materials Moving Workers",
            50=>"Travel, Tourism, and Culinary Arts",
            51=>"Vocational Home Economics",
        );
    }

}