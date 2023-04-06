<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $roles = User::getRules();
        return view('admin.user.create', compact('roles'));
    }
}
