<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public static function totalEmployee()
    {
        return Employee::count();
    }

    public static function employeeName($id)
    {
        $row = Employee::find($id);
        return $row->name;
    }
    public static function employeeDepartment($id)
    {
        $row = Employee::find($id);
        return $row->department;
    }
}
