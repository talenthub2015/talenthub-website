<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class HelpCentre extends Model {

    const STATUS_ADDRESSED = "Addressed";
    const STATUS_UNADDRESSED = "UnAddressed";

    protected $table = 'helpCenter';

    protected $fillable = [
        'query',
        'status'
    ];

    public function User(){
        return $this->hasOne('talenthub\User');
    }
}
