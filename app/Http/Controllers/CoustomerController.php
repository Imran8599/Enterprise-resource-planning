<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cashmemo;

class CoustomerController extends Controller
{
    public function index()
    {
        $rows = Cashmemo::all()->unique('phone');
        return view('coustomer',compact('rows'));
    }

}
