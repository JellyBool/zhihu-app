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

}
