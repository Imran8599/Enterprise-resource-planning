<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Payroll extends Model
{
    public static function payrollTotal()
    {
        return Payroll::where('payment_method','!=', null)->sum('net_salary');
    }

    public static function generate($id)
    {
        return Payroll::where(['employee_no'=>$id, 'month_year'=>Session::get('month').'|'.Session::get('year'), 'payment_method'=>null])->first();
    }

    public static function paid($id)
    {
        return Payroll::where(['employee_no'=>$id, 'month_year'=>Session::get('month').'|'.Session::get('year')])->where('payment_method','!=', null)->first();
    }

    public static function daySalary($date)
    {
        return Payroll::where('updated_at','LIKE',$date.'%')->where('payment_method','!=', null)->sum('net_salary');
    }

    public static function monthSalary($date)
    {
        return Payroll::where('updated_at','LIKE',$date.'%')->where('payment_method','!=', null)->sum('net_salary');
    }
}
