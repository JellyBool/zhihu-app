<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('users.setting');
    }

    public function store(Request $request)
    {
        user()->settings()->merge($request->all());

        return back();
    }
}
