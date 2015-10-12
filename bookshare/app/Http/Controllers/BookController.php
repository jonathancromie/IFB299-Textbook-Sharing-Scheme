<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;

use BookShare\Http\Requests;
use BookShare\Http\Controllers\BookController;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use BookShare\Book;
use BookShare\Student;
use BookShare\Contract;
use View;
use Log;
use Image;
use URL;
use Auth;
use Input;
use DB;

class BookController extends Controller
{

    // public function getShow($id) {
    //     // get the book
    //     $book = Book::find($id);
    //     // // show the view and pass the nerd to it
    //     return view('show')
    //         ->with('book', $book);
    // }
    // /**
    //  * Show sharer details
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    public function show($id)
    {
        $information = DB::table('students')
                    ->select('students.*', 'books.*', 'contracts.*')
                    ->join('books', 'students.student_id', '=', 'books.student_id')
                    ->join('contracts', function($join) use($id) {
                        $join->on('books.book_id', '=', 'contracts.book_id')
                            ->where('books.book_id', '=', $id);
                    })
                    ->get();
        return View::make('books.show')->with('information', $information);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $books = Book::all();
        // // load the view and pass the books
        // return View::make('books.index')->with('books', $books);
        // return view('index', array('page' => 'books.index'));
        return View::make('index');
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array('name' => 'required', 
                    'author' => 'required',
                    'isbn' => 'required|numeric',
                    'publisher' => 'required',
                    'edition' => 'required|numeric',
                    'due_date' => 'required'
                    );
        $validator = Validator::make(Input::all(), $rules);

        // // process the share redirect
        if ($validator->fails()) {
            return Redirect::to('share')->withErrors($validator);
        } 

        else {
            // store book
            $book = Book::firstOrCreate(['name' => Input::get('name'),
                                        'author' => Input::get('author'),
                                        'isbn' => Input::get('isbn'),
                                        'publisher' => Input::get('publisher'), 
                                        'edition' => Input::get('edition'),
                                        'faculty' => Input::get('faculty'),
                                        ]);

            $book->save();

            $user = Auth::user();
            $book->student_id = $user->student_id;
            $book->save();

            // USE THIS WHEN BORROW BUTTON CLICKED
            // $contract = Book::find(1)->contracts()->where('book_id', '=', $book->book_id);

            $contract = new Contract;
            $contract->sharer_id = $user->student_id;
            $contract->book_id = $book->book_id;
            $contract->due_date = Input::get('due_date');
            $contract->save();

            $image = Input::file('image');
            $extension = $image->getClientOriginalExtension();
            $book_id = $book->book_id;
            $filename  = $book_id . '.' . $extension;
            $path = public_path('uploads/' . $filename);
            \Image::make($image->getRealPath())->resize(50, 67)->save($path);
            $book->image = 'uploads/'.$filename;
            $book->image = $filename;
            $book->save();

            \Session::flash('message', 'Successfully created book!');  
            // redirect
            return Redirect::to('index');                       
        }            
    }
}
