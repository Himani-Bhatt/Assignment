<?php

namespace App\Http\Controllers;

use App\SetConfig;
use Illuminate\Http\Request;
use Setting;

class SettingsController extends Controller
{

    public function setting()
    {

        return view('settings');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        SetConfig::where('id', '>', 0)->update(['value' => 0]);
        if ($request->get('set')) {
            foreach ($request->get('set') as $key => $val) {
                SetConfig::where('name', $key)->update(['value' => $val]);
            }
        }

        return back();

    }
}
