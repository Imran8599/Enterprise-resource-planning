<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImportType;

class EveryMonthController extends Controller
{
    public function index()
    {
        return view('every_month');
    }
    public function everyMonthSearch(Request $r)
    {
        $date = $r->month.'-'.$r->year;
        $date2 = $r->year.'-'.$r->month;
        $importTypes = ImportType::orderBy('import_type')->get();
        $products = Product::orderBy('model')->get();
        return view('every_month',compact('products','importTypes','date','date2'));
    }
}
