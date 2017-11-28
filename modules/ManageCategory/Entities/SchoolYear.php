<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\Training;

class SchoolYear extends Model
{
    protected $fillable = [];
    public $primaryKey = 'yearID'; 
    protected $table = "school_years";
    /**
    * Get the semester for school years.
    */
    public function semesters()
    {
        return $this->hasMany('Modules\ManageCategory\Entities\Semester','yearID');
    }

    public function trainings_of_years()
    {
        return $this->belongsTo('Modules\ManageCategory\Entities\Training','trainingID');
    }
}
