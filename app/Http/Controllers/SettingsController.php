<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $row = Settings::get()->first();
        return view('settings',compact('row'));
    }

    public function store(Request $r)
    {
        $row = new Settings;
        if($r->website_logo != '')
        {
            $r->validate([
                'website_logo'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            
            $image = $r->file('website_logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/logo');
            $image->move($destinationPath, $name);
            $photo_name = 'public/logo/'.$name;
            $row->website_logo = $photo_name;
        }
        $row->website_name = $r->website_name;
        $row->website_title = $r->website_title;
        $row->email = $r->email;
        $row->password = $r->password;

        $result = $row->save();
        if($result)
        {
            alert()->success('Settings ready.', 'Success');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }

    public function edit($id)
    {
        $web = Settings::find($id);
        $row = Settings::get()->first();
        return view('settings',compact('row','web'));
    }
    
    public function update(Request $r)
    {
        $row = Settings::find($r->id);
        if($r->website_logo != '')
        {
            $r->validate([
                'website_logo'=>'required|image|mimes:jpeg,png,jpg'
            ]);
            
            $image = $r->file('website_logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/logo');
            $image->move($destinationPath, $name);

            if($row->website_logo != '')
                unlink($row->website_logo);

            $photo_name = 'public/logo/'.$name;
            $row->website_logo = $photo_name;
        }
        $row->website_name = $r->website_name;
        $row->website_title = $r->website_title;
        $row->email = $r->email;
        $row->password = $r->password;

        $result = $row->save();
        if($result)
        {
            alert()->success('Settings update successfully.', 'Success');
            return redirect('settings');
        }
        else
            return redirect()->back()->with('message-danger','Something is wrong!');
    }
}
