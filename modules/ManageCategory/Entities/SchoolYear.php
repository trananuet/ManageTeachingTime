<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $fillable = [];
    public $primaryKey = 'yearID'; 
    protected $table = "school_years";
}
