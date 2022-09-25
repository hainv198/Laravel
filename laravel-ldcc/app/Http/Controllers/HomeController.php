<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function route($name, $age = '') {
        return view('new');
    }
    public function post(Request $req) {
        $name = $req -> get('name');

        return view('result', [
            'name' => $name
        ]);
    }
}
