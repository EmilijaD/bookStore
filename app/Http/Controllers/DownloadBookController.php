<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DownloadBookController extends Controller
{
    public function download(Response $respose, Book $bookId){
//        print_r($bookId->id);
        $bookFilePath = $bookId->file_path;
//        echo $bookFilePath;

        $file_path = storage_path().'\\app\\'.$bookFilePath;
        echo $file_path;
        if (file_exists($file_path))
        {
            // Send Download
            return response()->download($file_path, $bookFilePath, [
//                'Content-Length: '. filesize($file_path),
                'Content-Type' => 'application/pdf'
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}
