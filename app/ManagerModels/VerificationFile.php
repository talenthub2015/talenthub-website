<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class VerificationFile extends Model {

    protected $fillable = [
        'fullFileName',
        'fileRelativeLocation'
    ];

    /**
     * @return Verification Request
     */
    public function verificationRequest(){
        return $this->belongsTo('talenthub\ManagerModels\Verification', 'verificationRequestId');
    }

}
