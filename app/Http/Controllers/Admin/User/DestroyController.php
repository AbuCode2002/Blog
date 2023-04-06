<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
