<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(User $user)
    {
        $roles = User::getRules();
        return view('admin.user.edit', compact('user','roles'));
    }
}
