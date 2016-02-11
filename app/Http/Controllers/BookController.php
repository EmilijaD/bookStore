<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Book;
use App\Category;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

//        print_r($books);

        return view('books.index', [
            'tags' => $tags,
            'categories' => $categories,
            'books' => $books
        ]);
    }

}
