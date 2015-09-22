<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;

use BookShare\Http\Requests;
use BookShare\Http\Controllers\BookController;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use BookShare\Book;
use BookShare\Sharer;
use BookShare\Borrower;
use BookShare\Contract;
use BookShare\Student;
use Session;
use View;
use Log;
use BookShare\Photo;
use Image;
use URL;

class BookController extends Controller
{
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

    public function share() {
        // return view('share', array('page' => 'books.share'));
        return View::make('share');
    }

    public function borrow() {
        return View::make('borrow');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search() {
        // return view('search', array('page' => 'search'));
        return View::make('search');
    }

    public function results() {
        // $books = Book::where('name', 'LIKE', Input::get('search'), 'AND', 'author', 'LIKE', Input::get('search'), 'AND', 'isbn', 'LIKE', Input::get('search'))->get();
        // $books = Book::whereRaw('name like ', Input::get('search'), array(25))->get();

        $search = Input::get('search');
        $query = '%'.$search.'%';

        // $books = Book::where('name', 'like', $query, 'or', 'author', 'like', $query, 'or', 'isbn', 'like', $query, 'or', 'faculty', 'like', $query)->get();
        $books = Book::where('name', 'like', $query)
                        ->orWhere('author', 'like', $query)
                        ->orWhere('isbn', 'like', $query)
                        ->orWhere('faculty', 'like', $query)->get();


        // foreach ($books as $book) {
        //     echo ($book->book_id . " " . $book->name);
        //     echo ('<br>');
        // }

        return View::make('results')->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
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

            /* Add Error Checking */
            if (Input::file('image')->isValid()) {
                $file = Input::file('image');
                $extension = $file->getClientOriginalExtension();
                //Creating sha1 version of the filename in case of conflicts
                // $sha1 = sha1($file->getClientOriginalName());  
                $book_id = $book->primaryKey;
                $filename = $book_id . '.' . $extension;

                $path = public_path("uploads/" . $filename);
                Session::flash('message', $book_id);

                Image::make($file->getRealPath())->resize(100,150)->save($path);

                $book->image = URL::to('uploads/' . $book_id);
                $book->save();
            }

            // needs fixing after registration is complete...student number to be stored in session after login
            $sharer_id = '09136690';
            $borrower_id = '09136691';
            $book_id = 24;
            $due_date = '2015-10-30';

            // /* Create and store sharer, borrower in contract */  
            // /* DEVELOP LATER - Store borrowers after sharer_id and book_id exist - resdirect to user profile*/   
            $contract = Contract::firstOrCreate(['sharer_id' => $sharer_id,
                                                'borrower_id' => $borrower_id,
                                                'book_id' => $book_id,
                                                'due_date' => $due_date
                                                ]);  


            // redirect
            return Redirect::to('profile');
            Session::flash('message', 'Successfully created book!');             
        }            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the book
        // $book = Book::find($id);

        // // show the view and pass the nerd to it
        // return View::make('books.show')
        //     ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
