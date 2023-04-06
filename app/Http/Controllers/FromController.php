<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class FromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
//        $ip = '103.111.62.0'; /* Static IP address */
        $ip = $request->ip();/* Dynamic IP address */
        $currentUserInfo = Location::get($ip);
        return view('from', compact('currentUserInfo'));
    }
}
