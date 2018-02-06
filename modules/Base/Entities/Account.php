<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [];
    public $primaryKey = 'id'; 
    protected $table = "accounts";
}
