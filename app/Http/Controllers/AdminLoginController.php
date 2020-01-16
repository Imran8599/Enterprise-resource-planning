<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Employee;
use Session;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function logOut()
    {
        Session::put('name','');
        alert()->success('Logout successful.', 'Logout!')->autoclose(3000);
        return redirect('login');
    }
    
    public function auth(Request $request)
    {
        $request->validate([
            'phone'=>'required',
            'password'=>'required'
        ]);

        $pass = $request->password;

        $row = Employee::where(['phone'=>$request->phone])->first();
        if($row != '')
        {
            $userPass = Crypt::decryptString($row->password);
            if($pass == $userPass)
            {
                Session(['department'=>$row->department, 'name'=>$row->name, 'phone'=>$row->phone]);
                alert()->success('Successfully Login.', 'Login');
                return redirect('/');
            }
            else
            {
                alert()->error('Invalid password !', 'Error!');
                return redirect()->back();
            }
        }
        else
        {
            alert()->error('Invalide phone number !', 'Error!');
            return redirect()->back();
        }
    }
}
