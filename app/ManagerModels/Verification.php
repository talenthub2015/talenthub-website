<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model {

    protected $fillable = [
        'club',
        'clubCountry',
        'league',
        'leagueWebsite',
        'clubWebsite',
        'roleAtClub',
        'agentLicenceNumber',
        'issuedDate',
        'expiryDate'
    ];

    protected $dates = [
        'issuedDate',
        'expiryDate',
    ];


    /**
     * @return ManagerProfile
     */
    public function managerProfile(){
        return $this->belongsTo('talenthub\ManagerModels\ManagerProfile', 'managerProfileId');
    }

    /**
     * @return Verification Files
     */
    public function verificationFiles(){
        return $this->hasMany('talenthub\ManagerModels\VerificationFile');
    }
}
