<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports;
use App\ImportType;
use SweetAlert;

class ImportController extends Controller
{
    public function index()
    {
        $import_types = ImportType::orderBy('import_type')->get();
        $rows = Imports::orderBy('id','desc')->get();
        return view('import',compact('rows','import_types'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'subject' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $row = new Imports;
        $row->date = $r->date;
        $row->subject = $r->subject;
        $row->quantity = $r->quantity;
        $row->price = $r->price;

        $result = $row->save();
        if($result)
        {
            alert()->success('Import added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function importType()
    {
        $rows = ImportType::all();
        return view('import_type',compact('rows'));
    }

    public function importTypeStore(Request $r)
    {
        $r->validate([
            'import_type'=>'required'
        ]);

        $row = new ImportType;
        $row->import_type = $r->import_type;
        
        $result = $row->save();
        if($result)
        {
            alert()->success('Import type added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
    public function importTypeEdit($id)
    {
        $rows = ImportType::all();
        $type = ImportType::find($id);
        return view('import_type',compact('rows','type'));
    }

    public function importTypeUpdate(Request $r)
    {
        $r->validate([
            'import_type'=>'required'
        ]);

        $row = ImportType::find($r->id);
        $row->import_type = $r->import_type;
        
        $result = $row->save();
        if($result)
        {
            alert()->success('Import update successfully.', 'Update');
            return redirect('import-type');
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public function importTypeDelete($id)
    {
        
        $result = ImportType::destroy($id);
        if($result)
        {
            alert()->success('Import delete successfully.', 'Delete');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
