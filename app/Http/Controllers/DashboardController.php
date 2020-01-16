<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImportType;
use SweetAlert;

class DashboardController extends Controller
{
    public function index()
    {
        $importTypes = ImportType::orderBy('import_type')->get();
        $products = Product::orderBy('model')->get();
        return view('dashboard',compact('products','importTypes'));
    }
}
