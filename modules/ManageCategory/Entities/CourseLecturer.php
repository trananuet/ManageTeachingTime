<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseLecturer extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "course_lecturers";
}
