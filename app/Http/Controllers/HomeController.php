<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show a list of all cookies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get()
    {
        $cookies = DB::table('cookies')->orderBy('name','ASC')->get();
        $arrayCookies = [];
        foreach ($cookies as $cookie) {
            $arrayCookies[] = $cookie;
        }
        return view('cookie', compact('arrayCookies'));
    }
}
