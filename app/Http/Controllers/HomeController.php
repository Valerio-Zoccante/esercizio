<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show details of all cookies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get()
    {
        $cookies = DB::table('cookies')->orderBy('name','ASC')->get();
        $arrayCookies = [];
        $arrayIngredients = [];
        $i = 0;
        foreach ($cookies as $cookie) {
            $arrayCookies[$i] = $cookie;
            $ingredients = DB::table('ingredients')->where('cookie_id', $cookie->id)->orderBy('name','ASC')->get();
            foreach ($ingredients as $ingredient) {
              $arrayIngredients[$i][] = $ingredient;
            }
            $i++;
        }
        return view('cookie', compact('arrayCookies', 'arrayIngredients'));
    }
}
