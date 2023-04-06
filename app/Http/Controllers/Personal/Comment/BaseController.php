<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Service\PersonalService;
use App\Service\PostService;

class BaseController extends Controller
{
    public $service;

    public function __construct(PersonalService $service)
    {
        $this->service = $service;
    }
}
