<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [];
    public $primaryKey = 'semesterID'; 
    protected $table = "semesters";
}
