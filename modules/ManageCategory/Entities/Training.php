<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\SchoolYears;

class Training extends Model
{
    protected $fillable = [];
    public $primaryKey = 'trainingID'; 
    protected $table = "trainings";


    public function school_years_of_training()
    {
        return $this->hasMany('Modules\ManageCategory\Entities\SchoolYears','trainingID');
    }
}