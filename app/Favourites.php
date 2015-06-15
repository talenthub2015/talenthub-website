<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model {

    protected $table = "favourite";

    protected $primaryKey = "favourite_id";

    protected $fillable = ['user_id','favourited_to'];

    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutateData = true;   //Setting data to be mutated before saving to database


    /**
     *Relationship between Favourites and User Profile
     * User Favourited by other users
     */
    public function userProfile()
    {
        return $this->belongsTo('talenthub\UserProfile','user_id');
    }


}
