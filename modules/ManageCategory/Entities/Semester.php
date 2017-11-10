<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\SchoolYears;

class Semester extends Model
{
    protected $fillable = [];
    public $primaryKey = 'semesterID'; 
    protected $table = "semesters";


    public function school_years()
    {
        return $this->belongsTo('Modules\ManageCategory\Entities\SchoolYears','yearID');
    }
}
