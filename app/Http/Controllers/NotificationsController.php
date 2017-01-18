<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

/**
 * Class NotificationsController
 * @package App\Http\Controllers
 */
class NotificationsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('notifications.index',compact('user'));
    }
}
