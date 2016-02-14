<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateBookController extends Controller
{
    public function rateThisBook(){
        $currentUserId = Auth::id();

        $bookIdToRate = $_POST['bookIdToRate'];

        $ratingInput = "";
        if(isset($_POST['userRating'])){
            $ratingInput = $_POST['userRating'];
        }

        $datetime = new \DateTime();
        $datetime->setTimeZone(new \DateTimeZone('Europe/Skopje'));

        $rated = DB::select('select * from bookstore.ratings where book_id = ' . $bookIdToRate .' and user_id ='. $currentUserId);

//        print_r($rated);
        if(sizeof($rated) == 0){
            if($ratingInput>=6 && $ratingInput<=10) {
                $idTag = DB::table('ratings')->insertGetId(
                    array('book_id' => $bookIdToRate, 'user_id' => $currentUserId, 'rating' => $ratingInput, 'created_at' => $datetime, 'updated_at' => $datetime)
                );
            }
        } else {
            if($ratingInput>=6 && $ratingInput<=10) {
            DB::table('ratings')
                ->where('book_id', $bookIdToRate)
                ->where('user_id', $currentUserId)
                ->update(array('rating' => $ratingInput, 'updated_at' => $datetime));
            }
        }

        $path = '/book/'. $bookIdToRate;
        header("Location: ".$path);
        exit();
    }
}
