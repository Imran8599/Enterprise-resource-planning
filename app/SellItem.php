<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellItem extends Model
{
    public static function daySellModel($date, $model)
    {
        return SellItem::where(['date'=>$date, 'model'=>$model])->sum('quantity');
    }

    public static function monthSellModel($date, $model)
    {
        return SellItem::where(['model'=>$model])->where('date','LIKE','%'.$date)->sum('quantity');
    }

    public static function daySellPrice($date, $model)
    {
        return SellItem::where(['date'=>$date, 'model'=>$model])->sum('price');
    }

    public static function monthSellPrice($date, $model)
    {
        return SellItem::where(['model'=>$model])->where('date','LIKE','%'.$date)->sum('price');
    }

    public static function totalSell($model)
    {
        return SellItem::where(['model'=>$model])->sum('quantity');
    }

    public static function memoQuantity($memoNo)
    {
        return SellItem::where(['memo_no'=>$memoNo])->sum('quantity');
    }

    public static function memoPrice($memoNo)
    {
        return SellItem::where(['memo_no'=>$memoNo])->sum('price');
    }
}
