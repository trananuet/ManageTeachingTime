<?php

namespace Modules\Statistic\Entities;

use Illuminate\Database\Eloquent\Model;

class ThesisLecturer extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "thesis_lecturers";
}
