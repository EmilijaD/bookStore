<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentBookController extends Controller
{
    public function commentThisBook(){
        $currentUserId = Auth::id();

        $bookIdToComment = $_POST['bookIdToComment'];

        $commentArea = "";
        if(isset($_POST['commentArea'])){
            $commentArea = $_POST['commentArea'];
        }

        $datetime = new \DateTime();
        $datetime->setTimeZone(new \DateTimeZone('Europe/Skopje'));


        $idTag = DB::table('comments')->insertGetId(
            array('book_id' => $bookIdToComment, 'user_id' => $currentUserId, 'comment' => $commentArea, 'created_at' => $datetime, 'updated_at' => $datetime)
        );

        $path = '/book/'. $bookIdToComment;
        header("Location: ".$path);
        exit();
    }
}
