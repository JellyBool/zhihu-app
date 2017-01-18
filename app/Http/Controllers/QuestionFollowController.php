<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

/**
 * Class QuestionFollowController
 * @package App\Http\Controllers
 */
class QuestionFollowController extends Controller
{

    /**
     * QuestionFollowController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow($question)
    {
        Auth::user()->followThis($question);

        return back();
    }
}
