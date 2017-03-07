<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class InboxController extends Controller
{

    /**
     * InboxController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = user()->messages->groupBy('from_user_id');

        return view('inbox.index',compact('messages'));
    }

    public function show($userId)
    {
        $messages = Message::where('from_user_id',$userId)->get();

        return $messages;
    }
}
