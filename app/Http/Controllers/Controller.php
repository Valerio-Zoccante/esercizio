<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CookieController extends Controller
{
    /**
     * Show a list of all cookies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cookies = DB::table('cookies')->get();

        return view('index', compact('cookies'));
    }
}
