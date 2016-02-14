<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDeleteBookController extends Controller
{
    public function deleteThisBook(){
        $currentUserId = Auth::id();

        $bookIdToDelete = $_POST['bookIdToDelete'];

        DB::table('books')->where('id', '=', $bookIdToDelete)->delete();

        DB::table('tags')->where('book_id', '=', $bookIdToDelete)->delete();

        DB::table('owns')->where('book_id', '=', $bookIdToDelete)->delete();

        DB::table('comments')->where('book_id', '=', $bookIdToDelete)->delete();

        DB::table('ratings')->where('book_id', '=', $bookIdToDelete)->delete();

        $path = '/user/'. $currentUserId   ;
        header("Location: ".$path);
        exit();
    }
}
