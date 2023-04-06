<?php
namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class   DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $posts = Auth::user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }

}
