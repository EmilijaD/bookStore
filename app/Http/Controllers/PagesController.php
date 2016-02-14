<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;

class PagesController extends Controller
{
    public function home() {

        //latest books
        $books = DB::table('books')->where('approved', true)->orderBy('created_at', 'desc')->take(5)->get();

        //recommended books for user
        $userId = Auth::id();
        //echo $userId;

        if(!is_null($userId)){
            $ownedBookIds = DB::select('select book_id from owns where user_id = '.$userId);
            //print_r($ownedBookIds);
        }

        $tagNames = array();
        foreach($ownedBookIds as $bookId){
            //echo $bookId->book_id."</br>";
            $results = DB::select('select tag from tags where book_id = '.$bookId->book_id);
            foreach($results as $result){
                array_push($tagNames,$result->tag);
            }

        }
//        print_r($tagNames);

        $mostWantedTagNames = array();
        $counter = array();

        $i = 0;
        foreach($tagNames as $tagName){
            if(in_array($tagName, $mostWantedTagNames)){
                if (($key = array_search($tagName, $mostWantedTagNames)) !== false) {
                    $counter[$key] += 1;
                }
            } else {
                array_push($mostWantedTagNames, $tagName);
                array_push($counter, 1);
            }
        }

        $sorted = false;
        while (false === $sorted) {
            $sorted = true;
            for ($i = 0; $i < count($counter) - 1; ++$i) {
                $current = $counter[$i];
                $next = $counter[$i + 1];
                $secondCurrent = $mostWantedTagNames[$i];
                $secondNext = $mostWantedTagNames[$i + 1];
                if ($next > $current) {
                    $counter[$i] = $next;
                    $counter[$i + 1] = $current;


                    $mostWantedTagNames[$i] = $secondNext;
                    $mostWantedTagNames[$i + 1] = $secondCurrent;
                    $sorted = false;
                }
            }
        }

//        print_r($mostWantedTagNames);
//        print_r($counter);
        $str = "";
        for($i = 0; $i < count($ownedBookIds) ; $i++){
            if ($i == 0) {
                $str = $str . '"' . $ownedBookIds[$i]->book_id . '"';
            } else {
                $str = $str . ', "' . $ownedBookIds[$i]->book_id . '"';
            }

        }
//        echo $str;

        $recommendedBookIds = array();
        foreach($mostWantedTagNames as $mostWantedTagName) {
            $query = 'select book_id from tags where tag like "' . $mostWantedTagName . '" AND book_id not in (' . $str . ')';
//            echo $query;
            $results = DB::select($query);
            foreach ($results as $result) {
                array_push($recommendedBookIds, $result->book_id);
            }

        }

//        print_r($recommendedBookIds);




        $booksToBeRecommended = array();
        for($i = 0 ; $i < count($recommendedBookIds) ; $i++){
            $results = DB::select('select * from books where id = '.$recommendedBookIds[$i].' and approved = 1');
            foreach($results as $result){
                if(count($booksToBeRecommended) == 10){
                    break;
                }
                array_push($booksToBeRecommended,$results[0]);
            }
        }

//        print_r($booksToBeRecommended);
        $users = User::all();
//        $books = Book::all();

        return view('pages.welcome', [
            'recommendedBooks' => $booksToBeRecommended,
            'users' => $users,
            'books' => $books
        ]);
    }

    public function about() {
        return view('pages.about');
    }
}
