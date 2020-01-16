<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extracost;

class ExtraCostsController extends Controller
{
    public function index()
    {
        $rows = Extracost::orderBy('id','desc')->get();
        return view('extracost',compact('rows'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'subject' => 'required',
            'price' => 'required'
        ]);

        $row = new Extracost;
        $row->date = $request->date;
        $row->subject = $request->subject;
        $row->price = $request->price;

        $result = $row->save();
        if($result)
        {
            alert()->success('Expanse added successfully.', 'Added');
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
