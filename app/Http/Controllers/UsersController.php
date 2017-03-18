<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $path = Storage::disk('local')->put('public',$request->file('img'));

        return [ 'url' => asset('storage/public/'.$path) ];
    }
}
