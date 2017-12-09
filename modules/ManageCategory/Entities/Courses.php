<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "courses";
}
