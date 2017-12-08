<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "titles";
}
