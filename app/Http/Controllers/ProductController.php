<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $rows = Product::all();
        return view('product',compact('rows'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'model'=>'required',
            'price'=>'required'
        ]);

        $row = new Product;
        $row->model = $r->model;
        $row->price = $r->price;

        $result = $row->save();
        if($result)
        {
            alert()->success('Product added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }

    public function edit($id)
    {
        $rows = Product::all();
        $product = Product::find($id);
        return view('product',compact('rows','product'));
    }
    public function update(Request $r)
    {
        $r->validate([
            'model'=>'required',
            'price'=>'required'
        ]);

        $row = Product::find($r->id);
        $row->model = $r->model;
        $row->price = $r->price;

        $result = $row->save();
        if($result)
        {
            alert()->success('Product update successfully.', 'Update');
            return redirect('product');
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }
    public function delete($id)
    {
        $result = Product::destroy($id);
        if($result)
        {
            alert()->success('Product delete successfully.', 'Delete');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }
}
