<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model {

    //Constants for status of a notification
	const NOTIFICATION_STATUS_READ = "notification_read";
    const NOTIFICATION_STATUS_UNREAD = "notification_unread";
    //Constants -- Type of Notifications
    const NOTIFICATION_TYPE_RECOMMENDATION = "notification_type_recommendation";
    const NOTIFICATION_TYPE_ENDORSEMENT = "notification_type_endorsement";
    const NOTIFICATION_TYPE_FAVOURITE = "notification_type_favourite";

    protected $table = "notifications";

    protected $primaryKey = "notification_id";

    protected $fillable = ['notification_to','notification_from','notification_type','status','post_id','notification_on'];

    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutateData = true;   //Setting data to be mutated before saving to database



}
