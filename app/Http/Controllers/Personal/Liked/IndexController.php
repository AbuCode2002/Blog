<?php
namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class   IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Auth::user()->likedPosts;
        return view('personal.liked.index', compact('posts'));
    }

}
