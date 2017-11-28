<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\SchoolYear;

class Training extends Model
{
    protected $fillable = [];
    public $primaryKey = 'trainingID'; 
    protected $table = "trainings";


    public function school_years()
    {
        return $this->hasMany('Modules\ManageCategory\Entities\SchoolYear','trainingID');
    }
}