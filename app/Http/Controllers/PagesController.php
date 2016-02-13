<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home() {
        $people = ['Taylor', 'Matt', 'Jeffrey'];

        return view('pages.welcome', [
            'people' => $people
        ]);
    }

    public function about() {
        return view('pages.about');
    }
}
