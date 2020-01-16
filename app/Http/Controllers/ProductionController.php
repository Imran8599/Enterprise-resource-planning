<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production;
use App\Product;
use App\ImportType;
use App\ImportsUsed;

class ProductionController extends Controller
{
    public function index()
    {
        $import_types = ImportType::orderBy('import_type')->get();
        $products = Product::orderBy('model')->get();
        $rows = Production::orderBy('id','desc')->get();
        return view('production',compact('rows','products','import_types'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'date' => 'required',
            'product' => 'required',
            'pitches' => 'required'
        ]);

        $row = new Production;
        $row->date = $r->date;
        $row->product = $r->product;
        $row->pitches = $r->pitches;

        $counts = $r->used_products;
        $n = 0;
        foreach($counts as $count)
        {
            $use = new ImportsUsed;
            $use->date = $r->date;
            $use->used_products = $r->used_products[$n];
            $use->used_quantitys = $r->used_quantitys[$n];
            $use->save();
            ++$n;
        }

        $result = $row->save();
        if($result)
        {
            alert()->success('Production added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
