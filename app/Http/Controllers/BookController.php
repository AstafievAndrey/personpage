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
    
    public function read($name=null,$chapter=null)
    {   
        if(is_null($name)){
            abort(404);
        }
        $book = DB::select('select 
                                    t1.name, 
                                    t1.id,
                                    t1.text,
                                    t1.translit, 
                                    (select count(*) from books_chapters t2 where t1.id = t2.book_id) count,
                                    (select array_to_string(array(SELECT t3.name FROM genres t3 JOIN books_genres t4 ON t4.genre_id = t3.id where t4.book_id = t1.id),\',\')) genres
                            from books t1
                            where translit = ?',[$name]);
        if(count($book)!=0){
            $chapters = DB::select('select t2.name,t2.translit,t2.title,t2.desc,t2.keywords
                            from books_chapters t1
                            join chapters t2 on t2.id = t1.chapter_id
                            where book_id = ?',[$book[0]->id]);
            return view('book.read',["h1"=>$book[0]->name,"book"=>$book[0],"chapters"=>$chapters]);
        }else{
            abort(404);
        }
        
    }
    
    
    
}

