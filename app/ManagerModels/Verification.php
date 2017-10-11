<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model {

    protected $fillable = [
        'verificationStatus',
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

    protected $casts = [
        'issuedDate' => 'date',
        'expiryDate' => 'date'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|ManagerProfile
     */
    public function managerProfile(){
        return $this->belongsTo('talenthub\ManagerModels\ManagerProfile', 'managerProfileId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|VerificationFile
     */
    public function verificationFiles(){
        return $this->hasMany('talenthub\ManagerModels\VerificationFile', 'verificationRequestId');
    }
}
