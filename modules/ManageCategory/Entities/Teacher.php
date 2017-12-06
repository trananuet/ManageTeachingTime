<?php

namespace Modules\ManageCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ManageCategory\Entities\Title;
use Modules\ManageCategory\Entities\Faculty;

class Teacher extends Model
{
    protected $fillable = [];
    public $primaryKey = 'teacherID'; 
    protected $table = "teacher";

    public function titles()
    {
        return $this->hasOne('Modules\ManageCategory\Entities\Title','titleID');
    }

    public function facultys()
    {
        return $this->hasOne('Modules\ManageCategory\Entities\Faculty','facultyID');
    }
}
