<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Employee;
use App\Salary;
use App\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $rows = Employee::all();
        return view('employee',compact('rows','departments'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'phone' => 'required | min:11 | max:11',
            'address' => 'required',
            'date_of' => 'required',
            'department' => 'required',
            'votar_id' => 'required',
            'salary' => 'required',
            // 'password' => 'required | min:5'
        ]);

        $row = new Employee;
        $row->name = $r->name;
        $row->phone = $r->phone;
        $row->address = $r->address;
        $row->date_of = $r->date_of;
        $row->department = $r->department;
        $row->votar_id = $r->votar_id;
        $row->salary = $r->salary;
        $row->password = Crypt::encryptString($r->password);
        $result = $row->save();

        if($result)
        {
            alert()->success('Employee added successfully.', 'Added');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }

    public static function edit($id)
    {
        $departments = Department::all();
        $rows = Employee::all();
        $employee = Employee::find($id);
        return view('employee',compact('rows','departments','employee'));
    }

    public static function update(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'phone' => 'required | min:11 | max:11',
            'address' => 'required',
            'date_of' => 'required',
            'department' => 'required',
            'votar_id' => 'required',
            'salary' => 'required',
            // 'password' => 'required | min:5'
        ]);

        $row = Employee::find($r->id);
        $row->name = $r->name;
        $row->phone = $r->phone;
        $row->address = $r->address;
        $row->date_of = $r->date_of;
        $row->department = $r->department;
        $row->votar_id = $r->votar_id;
        $row->salary = $r->salary;
        $row->password = Crypt::encryptString($r->password);
        $result = $row->save();
        if($result)
        {
            alert()->success('Employee update successfully.', 'Update');
            return redirect('employee');
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
    
    public static function delete($id)
    {
        $result = Employee::destroy($id);
        if($result)
        {
            alert()->success('Employee delete successfully.', 'Delete');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong !');
    }
}
