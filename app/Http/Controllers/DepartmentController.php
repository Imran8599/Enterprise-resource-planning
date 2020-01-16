<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $rows = Department::orderBy('department')->get();
        return view('department',compact('rows'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'department'=>'required'
        ]);

        $row = new Department;
        $row->department = $r->department;

        $result = $row->save();
        if($result)
        {
            alert()->success('Department added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }

    public function edit($id)
    {
        $rows = Department::orderBy('department')->get();
        $department = Department::find($id);
        return view('department',compact('rows','department'));
    }

    public function update(Request $r)
    {
        $r->validate([
            'department'=>'required'
        ]);

        $row = Department::find($r->id);
        $row->department = $r->department;

        $result = $row->save();
        if($result)
        {
            alert()->success('Department update successfully.', 'Update');
            return redirect('department');
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }
    
    public function delete($id)
    {
        $result = Department::destroy($id);
        if($result)
        {
            alert()->success('Department delete successfully.', 'Delete');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }
}
