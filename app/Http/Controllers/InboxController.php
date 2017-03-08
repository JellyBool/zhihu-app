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
        $messages = Message::where('to_user_id',user()->id)
            ->orWhere('from_user_id',user()->id)
            ->with(['fromUser','toUser'])->get();
        
        return view('inbox.index',['messages' => $messages->groupBy('to_user_id') ]);
    }

    public function show($dialogId)
    {
        $messages = Message::where('dialog_id',$dialogId)->get();

        return $messages;
    }
}
