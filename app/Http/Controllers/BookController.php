<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Own;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    const STORAGE_PATH = "C://Users//Emilija//Desktop//";

    public static function getStoragePath()
    {
        return self::STORAGE_PATH;
    }

    public function index()
    {

        $currentUserId = Auth::id();

        $admin = DB::select('select id from bookstore.users where email = ' . '"admin@admin.com"' . ' and name = "admin"');
        $adminId = $admin[0]->id;

        $canClaim = false;
        if ($currentUserId != $adminId) {
            $canClaim = true;
        }

//        $books = Book::all();
        $books = DB::table('books')->where('approved', true)->get();
        $categories = Category::all();

//        print_r($books);
//        return view('books.index', compact('books'));
        return view('books.index', [
            'books' => $books,
            'categories' => $categories,
            'canClaim' => $canClaim
        ]);
    }

    public function getBooksFromCategory(Category $category)
    {

        $currentUserId = Auth::id();

        $admin = DB::select('select id from bookstore.users where email = ' . '"admin@admin.com"' . ' and name = "admin"');
        $adminId = $admin[0]->id;

        $canClaim = false;
        if ($currentUserId != $adminId) {
            $canClaim = true;
        }

        $tags = Tag::all();
        $categories = Category::all();

        $book_ids = DB::table('tags')->select('book_id')->where('tag', $category->category_name)->get();

        $books = array();
        foreach ($book_ids as $book_id) {
            $id = $book_id->book_id;
//            echo $id;

            $book = DB::table('books')->where('id', $id)->where('approved', true)->get();

            if (!empty($book)) {
                array_push($books, $book[0]);
            }
//            print_r($book);
        }

//        print_r($books);

        return view('books.index', [
            'tags' => $tags,
            'categories' => $categories,
            'books' => $books,
            'canClaim' => $canClaim
        ]);
    }

    public function searchBooks()
    {
        $currentUserId = Auth::id();

        $admin = DB::select('select id from bookstore.users where email = ' . '"admin@admin.com"' . ' and name = "admin"');
        $adminId = $admin[0]->id;

        $canClaim = false;
        if ($currentUserId != $adminId) {
            $canClaim = true;
        }

        $tags = Tag::all();
        $categories = Category::all();
        $keyword = $_GET['searchField'];
        $books = array();
        //get from authors
        //$result = DB::table('books')->raw_where("authors LIKE '%Nick%'")->where('approved', true)->get();
        $results = DB::select('select * from bookstore.books where authors like "%' . $keyword . '%" and approved=1');
        foreach ($results as $result) {
            array_push($books, $result);
        }
        //get from titles
        $results = DB::select('select * from bookstore.books where title like "%' . $keyword . '%" and approved=1');
        foreach ($results as $result) {
            array_push($books, $result);
        }
        //get from tags
        $book_ids = DB::select('select book_id from bookstore.tags where tag like "%' . $keyword . '%"');
        foreach ($book_ids as $book_id) {
//            echo "EVE GO <br>";
//           echo($book_id->book_id);
            $book = DB::select('select * from bookstore.books where id = ' . $book_id->book_id . ' and approved=1');

            if (!empty($book)) {
                array_push($books, $book[0]);
            }
        }
        $ids = array();
        foreach ($books as $book) {
            if (in_array($book->id, $ids)) {
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
            'books' => $books,
            'canClaim' => $canClaim
        ]);
        // print_r($books);
    }

    public function addBookGet()
    {

        return view('books.addbook', [
            'warning' => false,
            'fileSizeWarning' => false,
            'success' => false,
            'fileExtensionWarning' => false
        ]);
    }

    public function addBookPost(Request $request)
    {
        $title = [];
        $authors = [];
        $categories = [];
        $summary = [];
        $tags = [];

        if (isset($_POST['title'])) {
            $title = $_POST['title'];
        }
        if (isset($_POST['authors'])) {
            $authors = $_POST['authors'];
        }
        if (isset($_POST['categories'])) {
            $categories = $_POST['categories'];
        }
        if (isset($_POST['summary'])) {
            $summary = $_POST['summary'];
        }
        if (isset($_POST['tags'])) {
            $tags = $_POST['tags'];
        }


        $datetime = new \DateTime();
        $datetime->setTimeZone(new \DateTimeZone('Europe/Skopje'));

        $warning = false;
        $fileSizeWarning = false;
        $success = false;
        $fileExtensionWarning = false;


        if ($_FILES['userfile']['size'] > 495 * 1024 * 1024) {
            $fileSizeWarning = true;
            if (empty($title) || empty($authors) || empty($categories) || empty($summary) || empty($tags)) {
                $warning = true;
            }
            return view('books.addbook', [
                'warning' => $warning,
                'fileSizeWarning' => $fileSizeWarning,
                'success' => $success,
                'fileExtensionWarning' => $fileExtensionWarning
            ]);
        } else
            if (empty($title) || empty($authors) || empty($categories) || empty($summary) || empty($tags) || $_FILES['userfile']['size'] == 0) {
                $warning = true;
                return view('books.addbook', [
                    'warning' => $warning,
                    'fileSizeWarning' => $fileSizeWarning,
                    'success' => $success,
                    'fileExtensionWarning' => $fileExtensionWarning
                ]);
            } else if (pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION) != "pdf") {
                $fileExtensionWarning = true;
                return view('books.addbook', [
                    'warning' => $warning,
                    'fileSizeWarning' => $fileSizeWarning,
                    'success' => $success,
                    'fileExtensionWarning' => $fileExtensionWarning
                ]);
            } else {

                $fileName = $_FILES['userfile']['name'];

                $random = rand(100000, 9000000);

                $fileName = $random . $fileName;


                Storage::put(
                    $fileName . '/',
                    file_get_contents($request->file('userfile')->getRealPath())
                );

                $id = DB::table('books')->insertGetId(
                    array('title' => $title, 'authors' => $authors, 'approved' => 0, 'summary' => $summary, 'file_path' => $fileName, 'created_at' => $datetime, 'updated_at' => $datetime)
                );

                $tagNames = explode(",", $tags);
                foreach ($tagNames as $tag) {
                    $idTag = DB::table('tags')->insertGetId(
                        array('book_id' => $id, 'tag' => $tag, 'created_at' => $datetime, 'updated_at' => $datetime)
                    );
                }

                foreach ($categories as $categoryName) {
                    $idTag = DB::table('tags')->insertGetId(
                        array('book_id' => $id, 'tag' => $categoryName, 'created_at' => $datetime, 'updated_at' => $datetime)
                    );
                }
                $success = true;
            }

        return view('books.addbook', [
            'warning' => $warning,
            'fileSizeWarning' => $fileSizeWarning,
            'success' => $success,
            'fileExtensionWarning' => $fileExtensionWarning
        ]);
    }

    public function bookDetails(Book $bookId)
    {
        $currentUserId = Auth::id();

        $admin = DB::select('select id from bookstore.users where email = ' . '"admin@admin.com"' . ' and name = "admin"');
        $adminId = $admin[0]->id;

        $canClaim = false;
        if ($currentUserId != $adminId) {
            $canClaim = true;
        }

        $rating = DB::select('select AVG(rating) as "rating" from bookstore.ratings where book_id = ' . $bookId->id . ' group by book_id');
        if (empty($rating)) {
            $rating = 0;
        } else {
            $rating = $rating[0]->rating;
        }

        $currentUserRating = DB::select('select * from bookstore.ratings where book_id = ' . $bookId->id . ' and user_id = ' . Auth::id());
        if (empty($currentUserRating)) {
            $currentUserRating = '';
        } else {
            $currentUserRating = $currentUserRating[0]->rating;
        }
//        print_r($currentUserRating);
//        echo $currentUserRating[0]->rating;
        //print_r($rating[0]->rating);
        $comments = DB::select('select * from bookstore.comments where book_id = ' . $bookId->id . ' order by updated_at desc');
        return view('books.details', [
            'book' => $bookId,
            'comments' => $comments,
            'rating' => round($rating, 1),
            'currentUserRating' => $currentUserRating,
            'canClaim' => $canClaim
        ]);
    }

    public function ownThisBook()
    {
        $currentUserId = Auth::id();

        $bookIdToOwn = $_POST['bookIdToOwn'];

        $datetime = new \DateTime();
        $datetime->setTimeZone(new \DateTimeZone('Europe/Skopje'));

        $owns = DB::select('select * from bookstore.owns where book_id = ' . $bookIdToOwn . ' and user_id =' . $currentUserId);

        if (sizeof($owns) == 0) {
            $idTag = DB::table('owns')->insertGetId(
                array('book_id' => $bookIdToOwn, 'user_id' => $currentUserId, 'created_at' => $datetime, 'updated_at' => $datetime)
            );
        } else {
            DB::table('owns')
                ->where('book_id', $bookIdToOwn)
                ->where('user_id', $currentUserId)
                ->update(array('updated_at' => $datetime));
        }

        $path = '/books';
        header("Location: " . $path);
        exit();
    }

    public function ownThisBookFromDetails()
    {
        $currentUserId = Auth::id();

        $bookIdToOwn = $_POST['bookIdToOwn'];

        $datetime = new \DateTime();
        $datetime->setTimeZone(new \DateTimeZone('Europe/Skopje'));

        $owns = DB::select('select * from bookstore.owns where book_id = ' . $bookIdToOwn . ' and user_id =' . $currentUserId);

        if (sizeof($owns) == 0) {
            $idTag = DB::table('owns')->insertGetId(
                array('book_id' => $bookIdToOwn, 'user_id' => $currentUserId, 'created_at' => $datetime, 'updated_at' => $datetime)
            );
        } else {
            DB::table('owns')
                ->where('book_id', $bookIdToOwn)
                ->where('user_id', $currentUserId)
                ->update(array('updated_at' => $datetime));
        }

        $path = '/book/' . $bookIdToOwn;
        header("Location: " . $path);
        exit();
    }


}
