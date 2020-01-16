<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imports extends Model
{
    public static function importTotal()
    {
        return Imports::sum('price');
    }

    public static function dayImport($date)
    {
        return Imports::where(['date'=>$date])->sum('price');
    }

    public static function monthImport($date)
    {
        return Imports::where('date','LIKE','%'.$date)->sum('price');
    }

    public static function totalImports($type)
    {
        return Imports::where(['subject'=>$type])->sum('quantity');
    }
}
