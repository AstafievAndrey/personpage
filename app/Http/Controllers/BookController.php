<?php
namespace App\Http\Controllers;

use DB;

use App\Http\Requests;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $books = DB::select('select 
                                    t1.name, 
                                    t1.text,
                                    t1.translit, 
                                    (select count(*) from books_chapters t2 where t1.id = t2.book_id) count,
                                    (select array_to_string(array(SELECT t3.name FROM genres t3 JOIN books_genres t4 ON t4.genre_id = t3.id where t4.book_id = t1.id),\',\')) genres
                            from books t1');
        
        return view('book.index',["books"=>$books,"h1"=>"Книги"]);
    }
    
    public function read($book=null,$chapter=null)
    {
        return view('book.read',["h1"=>"Книга"]);
    }
    
    
    
}

