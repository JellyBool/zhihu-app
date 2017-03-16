<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

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

        return view('notifications.index', compact('user'));
    }

    public function show(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect(\Request::query('redirect_url'));
    }
}
