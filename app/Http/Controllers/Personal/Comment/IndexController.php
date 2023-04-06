<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = Auth::user()->comments;
        return view('personal.comment.index', compact('comments'));
    }
}
