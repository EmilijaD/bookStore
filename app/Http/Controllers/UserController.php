<?php
namespace App\Http\Controllers;
use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Posts;
use App\Own;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /*
 * Display the posts of a particular user
 *
 * @param int $id
 * @return Response
 */



//    public function user_posts($id)
//    {
//        //
//        $posts = Posts::where('author_id',$id)->where('active','1')->orderBy('created_at','desc')->paginate(5);
//        $title = User::find($id)->name;
//        return view('home')->withPosts($posts)->withTitle($title);
//    }
//    public function user_posts_all(Request $request)
//    {
//        //
//        $user = $request->user();
//        $posts = Posts::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
//        $title = $user->name;
//        return view('home')->withPosts($posts)->withTitle($title);
//    }
//
//    public function user_posts_draft(Request $request)
//    {
//        //
//        $user = $request->user();
//        $posts = Posts::where('author_id',$user->id)->where('active','0')->orderBy('created_at','desc')->paginate(5);
//        $title = $user->name;
//        return view('home')->withPosts($posts)->withTitle($title);
//    }
    /**
     * profile for user
     */
    public function profile(Request $request, $id)
    {
        $id = Auth::id();
        $data['user'] = User::find($id);

        $allBooks = \DB::table('books')->where('approved', true)->orderBy('created_at', 'desc')->get();

        $booksToApprove = \DB::select('select * from bookstore.books where approved = 0' );

        $owns = Own::all();

        if (!$data['user'])
            return redirect('/');

//        if ($request -> user() && $data['user'] -> id == $request -> user() -> id) {
//            $data['author'] = true;
//        } else {
//            $data['author'] = null;
//        }

        $data['admin'] = false;
        if ($request -> user() && $data['user'] -> id == $request -> user() -> id ) {
            if($data['user']->name =='admin' && $data['user']->email =='admin@admin.com') {
                $data['admin'] = true;
            }
        }

        $bookIds = array();
        foreach($owns as $own){
            if($own->user_id == $id){
                array_push($bookIds, $own->book_id);
            }
        }

        $books = array();
        foreach($bookIds as $id){
            $book = \DB::select('select * from bookstore.books where id = ' . $id );
            if (!empty($book)) {
                array_push($books, $book[0]);
            }
        }


//        $data['comments_count'] = $data['user'] -> comments -> count();
//        $data['posts_count'] = $data['user'] -> posts -> count();
//        $data['posts_active_count'] = $data['user'] -> posts -> where('active', '1') -> count();
//        $data['posts_draft_count'] = $data['posts_count'] - $data['posts_active_count'];
//        $data['latest_posts'] = $data['user'] -> posts -> where('active', '1') -> take(5);
//        $data['latest_comments'] = $data['user'] -> comments -> take(5);

//        return view('admin.profile', $data);
        return view('user.profile', [
            'books' => $books,
            'admin' =>  $data['admin'],
            'allBooks' => $allBooks,
            'booksToApprove' => $booksToApprove
        ]);
    }

    public function approveBook()
    {
        $bookId = $_POST['bookId'];

        \DB::table('books')
            ->where('id', $bookId)
            ->update(array('approved' => 1));

        $path = $_SERVER['REQUEST_URI'];
        header("Location: ".$path); /* Redirect browser */
        exit();
    }
}