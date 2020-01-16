<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cashmemo;
use App\Product;
use App\SellItem;
use Session;
use PDF;

class CashMemoController extends Controller
{
    public function index()
    { 
        $products = Product::orderBy('model')->get();
        $rows = Cashmemo::orderBy('id','desc')->get();
        return view('cash_memo',compact('rows','products'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required'
        ]);

        $row = new Cashmemo;
        $row->memo_no = $r->memo_no;
        $row->date = $r->date;
        $row->name = $r->name;
        $row->phone = $r->phone;
        $row->address = $r->address;
        $row->pitches = $r->totalPitches;
        $row->price = $r->totalPrice;
        $row->seller = Session::get('name');
            
        $models = $r->product_model;
        $n = 0;
        foreach ($models as $model){
            $sell = new SellItem;
            $sell->date = $r->date;
            $sell->memo_no = $r->memo_no;
            $sell->model = $model;
            $sell->quantity = $r->quantity[$n];
            $sell->price_1ps = $r->pitchPrice[$n];
            $sell->price = $r->price[$n];
            $sell->save();
            ++$n;
        }

        $result = $row->save();
        if($result)
        {
            alert()->success('Memo is ready!', 'Ready');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }

    public function printInvoice($id)
    {
        $coustomer = Cashmemo::find($id);
        $items = SellItem::where('memo_no','=',$coustomer->memo_no)->get();
        // return view('print_invoice',compact('coustomer','items'));
        $pdf = PDF::loadView('print_invoice',compact('coustomer','items'));
        return $pdf->stream();
    }
}
