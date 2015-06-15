<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model {

	protected $table = "user_settings";

    protected $primaryKey = "id";

    protected $fillable = ['user_id','setting_type','setting_value'];

    public $timestamps = false;

}
