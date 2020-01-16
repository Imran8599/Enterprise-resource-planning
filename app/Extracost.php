<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extracost extends Model
{
    public static function totalExpanse()
    {
        return Extracost::sum('price');
    }

    public static function dayExpanse($date)
    {
        return Extracost::where(['date'=>$date])->sum('price');
    }

    public static function monthExpanse($date)
    {
        return Extracost::where('date','LIKE','%'.$date)->sum('price');
    }
}
