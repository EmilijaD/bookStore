<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Book;
use App\Category;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class BookController extends Controller
{
    public function index()
    {

//        $books = Book::all();
        $books = DB::table('books')->where('approved', true)->get();
        $categories = Category::all();

//        print_r($books);
//        return view('books.index', compact('books'));
        return view('books.index', [
            'books' => $books,
            'categories' => $categories
        ]);
    }

    public function getBooksFromCategory(Category $category)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $book_ids = DB::table('tags')->select('book_id')->where('tag', $category->category_name)->get();

        $books = array();
        foreach ($book_ids as $book_id) {
            $id = $book_id->book_id;
//            echo $id;

            $book = DB::table('books')->where('id', $id)->where('approved', true)->get();

            if(!empty($book)) {
                array_push($books, $book[0]);
            }
//            print_r($book);
        }

//       print_r($books);

        return view('books.index', [
            'tags' => $tags,
            'categories' => $categories,
            'books' => $books
        ]);
    }

    public function searchBooks(){
        //echo Form::text('searchField');\
        $tags = Tag::all();
        $categories = Category::all();

        $keyword = $_GET['searchField'];

        $books = array();
        //get from authors
        //$result = DB::table('books')->raw_where("authors LIKE '%Nick%'")->where('approved', true)->get();
        $results = DB::select('select * from bookstore.books where authors like "%'.$keyword.'%" and approved=1');
        foreach ($results as $result) {
            array_push($books, $result);
        }
        //get from titles
        $results = DB::select('select * from bookstore.books where title like "%'.$keyword.'%" and approved=1');
        foreach ($results as $result) {
            array_push($books, $result);
        }
        //get from tags
        $book_ids = DB::select('select book_id from bookstore.tags where tag like "%'.$keyword.'%"');
        foreach($book_ids as $book_id){
//            echo "EVE GO <br>";
//           echo($book_id->book_id);
            $book = DB::select('select * from bookstore.books where id = '.$book_id->book_id);
            array_push($books,$book[0]);
        }

        $ids = array();
        foreach($books as $book){
            if(in_array($book->id, $ids)){
                if (($key = array_search($book, $books)) !== false) {
                    unset($books[$key]);
                }
            } else {
                array_push($ids, $book->id);
            }
        }


        return view('books.index', [
            'tags' => $tags,
            'categories' => $categories,
            'books' => $books
        ]);
       // print_r($books);
    }

}
