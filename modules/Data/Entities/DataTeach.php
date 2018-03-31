<?php

namespace Modules\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class DataTeach extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "data_teaches";
}