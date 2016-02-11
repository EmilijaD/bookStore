<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    public function index() {

        $cards = Card::all();
//        $cards = DB::table('cards')->get();
        return view('cards.index', compact('cards'));
    }

//    public function show($id) {
//
//        $card = Card::find($id);
//
//        return view('cards.show', compact('card'));;
//    }

    public function show(Card $card) { //has the same name as in routes.php in the {} brackets

        return view('cards.show', compact('card'));;
    }
}
