<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{

    protected $table = "awards";

    protected $primaryKey = "award_id";

    protected $fillable = [
        'award_details'
    ];


    /*
     * Variable used to check whether need to mutate values while retrieving values form database or saving in it.
     */
    public $getMutatedData = true;  //Getting Mutated data from database.
    public $setMutateData = true;   //Setting data to be mutated before saving to database


    /**
     * Belongs to User Profile Model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('talenthub\UserProfile','user_id');
    }


    /**
     *Inserting line break when extracting
     */
    public function getawardDetailsAttribute($award_details)
    {
        if($this->getMutatedData)
        {
            return preg_replace("/\r?\n/","<br>",$award_details);
        }
    }

}
