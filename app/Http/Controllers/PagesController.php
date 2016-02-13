<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;

class PagesController extends Controller
{
    public function home() {

        $books = DB::table('books')->where('approved', true)->orderBy('created_at', 'desc')->take(5)->get();

        $users = User::all();
//        $books = Book::all();

        return view('pages.welcome', [
            'users' => $users,
            'books' => $books
        ]);
    }

    public function about() {
        return view('pages.about');
    }
}
