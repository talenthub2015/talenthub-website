<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;
use talenthub\Repositories\UserMetaRepository;

class UserMeta extends Model {

	protected $table= "user_meta";

    protected $fillable = ['user_id','meta_type','meta_value'];

//    protected $primaryKey = null;

    public $timestamps = false;

    protected $touches = [];


    /**
     * Get value of meta field which has profile Image top value
     * @param $query
     */
    public function scopeProfileImageTop($query)
    {
        return $query->where('meta_type','=',UserMetaRepository::PROFILE_IMAGE_TOP_POSITION);
    }

    /**
     * Get value of meta field which has profile Image Left value
     * @param $query
     */
    public function scopeProfileImageLeft($query)
    {
        return $query->where('meta_type','=',UserMetaRepository::PROFILE_IMAGE_LEFT_POSITION);
    }

    /**
     * Get value of meta field which has cover Image top value
     * @param $query
     */
    public function scopeCoverImageTop($query)
    {
        return $query->where('meta_type','=',UserMetaRepository::COVER_IMAGE_TOP_POSITION);
    }


}
