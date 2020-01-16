<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashmemo extends Model
{
    public static function totalIncome()
    {
        return Cashmemo::sum('price');
    }

    public static function sellTotal()
    {
        return Cashmemo::sum('pitches');
    }

    public static function memoCount()
    {
        return Cashmemo::count();
    }

    public static function totalCoustomer()
    {
        return Cashmemo::distinct()->get(['phone'])->count();
    }

    public static function daySellQuantity($date)
    {
        return Cashmemo::where(['date'=>$date])->sum('pitches');
    }

    public static function monthSellQuantity($date)
    {
        return Cashmemo::where('date','LIKE','%'.$date)->sum('pitches');
    }

    public static function dayIncome($date)
    {
        return Cashmemo::where(['date'=>$date])->sum('price');
    }

    public static function monthIncome($date)
    {
        return Cashmemo::where('date','LIKE','%'.$date)->sum('price');
    }

}
