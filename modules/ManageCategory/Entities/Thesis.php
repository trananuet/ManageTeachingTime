<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "thesis";
}
