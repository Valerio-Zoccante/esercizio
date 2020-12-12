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
        $test = DB::table('cookies')->get();

      $cookies = [
        [
          'name' => 'brownies',
          'weight' => '200g',
          'calories' => '3000'
        ],
        [
          'name' => 'strong_chocolate',
          'weight' => '215g',
          'calories' => '2000'
        ],
        [
          'name' => 'dark_chocolate',
          'weight' => '215g',
          'calories' => '2700'
        ],
        [
          'name' => 'white_chocolate',
          'weight' => '155g',
          'calories' => '1300'
        ],
        [
          'name' => 'vegan_cookies',
          'weight' => '157g',
          'calories' => '1000'
        ]
      ];
        return view('cookie', compact('cookies', 'test'));
    }
}
