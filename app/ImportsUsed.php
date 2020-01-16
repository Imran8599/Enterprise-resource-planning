<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportsUsed extends Model
{
    public static function used($date, $model)
    {
        $row = ImportsUsed::where(['date'=>$date, 'used_products'=>$model])->first();
        return @$row->used_quantitys;
    }

    public static function dayImportsUsed($date, $type)
    {
        return ImportsUsed::where(['date'=>$date,'used_products'=>$type])->sum('used_quantitys');
    }

    public static function monthImportsUsed($date, $type)
    {
        return ImportsUsed::where(['used_products'=>$type])->where('date','LIKE','%'.$date)->sum('used_quantitys');
    }

    public static function dayUsedTotal($date)
    {
        return ImportsUsed::where(['date'=>$date])->sum('used_quantitys');
    }

    public static function monthUsedTotal($date)
    {
        return ImportsUsed::where('date','LIKE','%'.$date)->sum('used_quantitys');
    }

    public static function totalImportsUsed($type)
    {
        return ImportsUsed::where(['used_products'=>$type])->sum('used_quantitys');
    }
}
