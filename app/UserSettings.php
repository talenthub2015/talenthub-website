<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model {


    /**
     * Type of Privacy options available
     */
    const PRIVACY_TYPE_PROFILE = "privacy_type_profile";
    const PRIVACY_TYPE_VIDEOS = "privacy_type_videos";
    const PRIVACY_TYPE_IMAGES = "privacy_type_images";

    //Value accepted for a privacy type
    const PRIVACY_SET = "yes";
    const PRIVACY_UNSET = "no";


    /**
     * Type of General Settings options
     */
    const GENERAL_TYPE_EMAIL = "general_type_email";
    const GENERAL_TYPE_PASSWORD = "general_type_password";


	protected $table = "user_settings";

    protected $primaryKey = "id";

    protected $fillable = ['user_id','setting_type','setting_value'];

    public $timestamps = false;

}
