<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "facultys";
}
