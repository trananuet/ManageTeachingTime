<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [];
    public $primaryKey = 'titleID'; 
    protected $table = "title";
}
