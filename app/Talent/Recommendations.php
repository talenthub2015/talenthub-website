<?php namespace talenthub\Talent;

use Illuminate\Database\Eloquent\Model;

class Recommendations extends Model {

    protected $table = "recommendations";

    protected $primaryKey = "recommendation_id";

    protected $fillable = ['user_id','recommender_type','status','name','email','organisation','position','atheletic_ability',
        'leadership','team_player','easy_to_work','comment_atheletic_ability','comment_player_personality'];


    /**
     * Relationship between User and recommendation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('talenthub\UserProfile');
    }

}
