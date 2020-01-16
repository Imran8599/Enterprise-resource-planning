<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public static function totalDepartment()
    {
        return Department::orderBy('department')->get();
    }
}
