<?php namespace talenthub\Media;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

    protected $table = "images";

    protected $primaryKey = "image_id";

    protected $fillable = ['user_id','title','descriptions','image_url','added_on'];

    protected $dates = ["added_on"];

    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutateData = true;   //Setting data to be mutated before saving to database


    /**
     *Relationship between user and videos
     */
    public function userProfile()
    {
        return $this->belongsTo('\talenthub\UserProfile','user_id');
    }


    /**
     * Mutating date into readable format
     * @param $added_on
     */
    public function getaddedOnAttribute($added_on)
    {
        if($this->getMutatedData)
        {
            return Carbon::parse($added_on)->diffForHumans();
        }
        return $added_on;
    }

}
