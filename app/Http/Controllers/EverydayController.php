<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImportType;

class EverydayController extends Controller
{
    public function index()
    {
        return view('everyday');
    }

    public function everydaySearch(Request $r)
    {
        $date = $r->day.'-'.$r->month.'-'.$r->year;
        $date2 = $r->year.'-'.$r->month.'-'.$r->day;
        $importTypes = ImportType::orderBy('import_type')->get();
        $products = Product::orderBy('model')->get();
        return view('everyday',compact('products','importTypes','date','date2'));
    }
}
