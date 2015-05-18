<?php namespace talenthub;

use Illuminate\Database\Eloquent\Model;

class TalentCareerReferences extends Model {

	protected $table = "career_references";

    protected $primaryKey = "reference_id";

    protected $fillable = [
        'name','relationship','occupation','email','contact_number'
    ];


    /**
     *Returns the array of fillable field by this Model
     */
    public function getFillAbleField()
    {
        return $this->fillable;
    }



    /**
     *Relationship between career_references and career information
     */
    public function careerInformation()
    {
        return $this->belongsTo('talenthub\TalentCareerInformation','career_id');
    }

}
