<?php namespace talenthub\ManagerDatabaseModel;

use Illuminate\Database\Eloquent\Model;

class ManagersDatabase extends Model {

	protected $table = "managers_database";

    protected $primaryKey = "id";

    protected $fillable = ['manager_type','management_level','sport_type','sport_gender','designation','coach_name','email',
        'contact_no','country','state', 'institution_type','institution_name'];

}
