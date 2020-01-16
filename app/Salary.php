<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public static function salaryThisMonth()
    {
        return Salary::where(['date'=>date('m/Y')])->sum('salary');
    }

    public static function balance($name, $phone)
    {
        return Salary::where(['name'=>$name, 'phone'=>$phone])->sum('salary');
    }
}
