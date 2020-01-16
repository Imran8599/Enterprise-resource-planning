<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public static function dayMadeModel($date, $model)
    {
        return Production::where(['date'=>$date, 'product'=>$model])->sum('pitches');
    }

    public static function monthMadeModel($date, $model)
    {
        return Production::where(['product'=>$model])->where('date','LIKE','%'.$date)->sum('pitches');
    }

    public static function dayMadeTotal($date)
    {
        return Production::where(['date'=>$date])->sum('pitches');
    }

    public static function monthMadeTotal($date)
    {
        return Production::where('date','LIKE','%'.$date)->sum('pitches');
    }

    public static function totalMade($model)
    {
        return Production::where('product',$model)->sum('pitches');
    }

    public static function madeTotal()
    {
        return Production::sum('pitches');
    }
    
}
