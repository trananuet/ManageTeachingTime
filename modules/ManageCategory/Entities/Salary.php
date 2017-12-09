<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "salarys";

}
