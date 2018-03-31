<?php

namespace Modules\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class DataGuide extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "data_guides";
}
