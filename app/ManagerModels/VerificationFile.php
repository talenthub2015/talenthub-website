<?php namespace talenthub\ManagerModels;

use Illuminate\Database\Eloquent\Model;

class VerificationFile extends Model {

    protected $table = "verificationFiles";

    protected $fillable = [
        'fullFileName',
        'fileRelativeLocation'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Verification
     */
    public function verificationRequest(){
        return $this->belongsTo('talenthub\ManagerModels\Verification', 'verificationRequestId');
    }

}
