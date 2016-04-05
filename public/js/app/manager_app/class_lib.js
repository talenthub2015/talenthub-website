/**
 * Created by piyush sharma on 15-02-2016.
 */
'use strict';

//Defining Enum for Cookies

var CookieEnum = {
    IntendedURL : "IntendedURL",
    ManagerType : "ManagerType",
    ManagementLevel : "ManagementLevel"
};

//Defining a Class/Property for Cookies
function Cookie(cookieType, value)
{
    this.cookieType=cookieType;
    this.val = value;
}

Cookie.prototype = {
    constructor : Cookie,
    getCookie : function(){
        return this;
    },

    setValueForCookie : function(value){
        this.val = value;
    }
};

/*Defining Country Class, that can be used in Other Classes*/
function CountrySelected()
{
    this.country_name = undefined;
    this.country_array_index = undefined;
}
CountrySelected.prototype = {
    constructor : CountrySelected,
    setCountryByName : function(countryName,countriesArray){
        //console.log('Country Set as:',countryName + " " +countriesArray.indexOf(countryName));
        if(countriesArray.indexOf(countryName) >= 0)
        {
            this.country_array_index = countriesArray.indexOf(countryName);
            this.country_name = countryName;
        }
    },
    getCountryName : function(){
        return this.country_name;
    },
    getCountryIndex : function(){
        return this.country_array_index;
    }
};


/*
-----------------------------------------------------------------------------------------------------------------------
--------------------------------------------- Manager Profile Classes -------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------
* */

function Manager()
{
    this.user_type="";
    this.sport="";
    this.management_level="";
    this.first_name = "";
    this.middle_name = "";
    this.last_name = "";
    this.dob = "";
    this.gender = "";
    this.nationality = "";
    this.mobile_number = "";
    this.home_number = "";
    this.street_address = "";
    this.city = "";
    this.state = "";
    this.zip = null;
    this.country = new CountrySelected();
    this.bio = "";
    this.institution_type = "";
    this.institution_name = "";
    //Manager Career History
    this.careerHistory = [];
}

Manager.prototype = {
    constructor : Manager,
    /*Returns Manager object*/
    getManager : function(){
        return this;
    },
    /*Set properties of Manager object
    * @param JSON jsonObject*/
    setManager : function(jsonObj,rootScope){
        this.first_name = jsonObj.first_name;
        this.middle_name = jsonObj.middle_name;
        this.last_name = jsonObj.last_name;
        this.dob = jsonObj.dob;
        this.gender = jsonObj.gender;
        this.nationality = jsonObj.nationality;
        this.mobile_number = jsonObj.mobile_number;
        this.home_number = jsonObj.home_number;
        this.street_address = jsonObj.street_address;
        this.city = jsonObj.city;
        this.state = jsonObj.state;
        this.zip = jsonObj.zip == undefined ? null : parseInt(jsonObj.zip);
        //console.log('From Server',jsonObj);
        jsonObj.country != undefined ? this.country.setCountryByName(jsonObj.country,rootScope.basicSiteConstants.countries) : "";
        this.bio = jsonObj.bio;
        this.user_type= jsonObj.user_type == undefined ? null : jsonObj.user_type;
        this.sport= jsonObj.sport_type == undefined ? null : jsonObj.sport_type;
        this.management_level= jsonObj.management_level == undefined ? null : jsonObj.management_level;
        this.institution_type = jsonObj.institution_type == undefined ? null : jsonObj.institution_type;
        this.institution_name = jsonObj.institution_name == undefined ? null : jsonObj.institution_name;
    },
    addCareerHistory : function(careerHistory)
    {
        this.careerHistory.push(careerHistory);
    },
    removeCareerHistory : function(careerHistory)
    {
        this.careerHistory.splice(this.careerHistory.indexOf(careerHistory),1);
    }
};



/*Manager Career History*/
function ManagerCareerHistory()
{
    this.id = null;
    this.year = null;
    this.achievement = [];
}

ManagerCareerHistory.prototype = {
    constructor : ManagerCareerHistory,
    getCareerHistory : function(){
        return this;
    },
    setCareerHistory : function(year,achievements)
    {
        this.year = year;
        this.achievement = achievements;
    },
    numberOfAchievements : function(){
        return this.achievement.length;
    },
    addAnAchievement : function(achievement){
        this.achievement.push(achievement);
    },
    removeAchievement : function(achievement){
        //console.log('Element',this.achievement.indexOf(achievement));
        this.achievement.splice(this.achievement.indexOf(achievement),1);
    }
};