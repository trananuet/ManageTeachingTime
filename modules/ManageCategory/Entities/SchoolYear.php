<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\Semester;

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
}
