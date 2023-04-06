<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('personal.comment.create');
    }
}
