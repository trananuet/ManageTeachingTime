<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\SchoolYear;

class SchoolYearRepository 
{
    /**
    * school year
    * @author AnTV
    * @return static
    */
    public static function getAllSchoolYear()
    {
        $schoolYear = SchoolYear::all();
        return $schoolYear;
    }
}