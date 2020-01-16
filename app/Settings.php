<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public static function setting()
    {
        return Settings::get()->first();
    }
}
