<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;

use BookShare\Http\Requests;
use BookShare\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


use BookShare\Book;
use View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::all();

        // load the view and pass the books
        return View::make('books.index')->with('books', $books);
    }

    public function share() {
        // return view('books.share', array('page' => 'books.share'));
        return View::make('books.share');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search() {
        return view('books.search', array('page' => 'search'));
    }

    public function results($search) {
        // $books = Book::where('name', 'LIKE', Input::get('search'), 'AND', 'author', 'LIKE', Input::get('search'), 'AND', 'isbn', 'LIKE', Input::get('search'))->get();
        // $books = Book::whereRaw('name like ', Input::get('search'), array(25))->get();

        $search = Input::get('search');
        $query = '%'.$search.'%';

        $books = Book::where('name', 'like', $query, 'and', 'author', 'like', $query, 'and', 'isbn', 'like', $query, 'and', 'faculty', 'like', $query)->get();

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
                    'isbn' => 'required',
                    'publisher' => 'required',
                    );
        $validator = Validator::make(Input::all(), $rules);

        // // process the login
        if ($validator->fails()) {
            return Redirect::to('books/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $book = new Book;
            $book->name = Input::get('name');
            $book->author = Input::get('author');
            $book->isbn = Input::get('isbn');
            $book->publisher = Input::get('publisher');
            $book->edition = Input::get('edition');
            $book->faculty = Input::get('faculty');
            $book->save();

            // redirect
            \Session::flash('message', 'Successfully created book!');
            return Redirect::to('books');
        }

        // $book = new Book;
        //     $book->name = Input::get('name');
        //     $book->author = Input::get('author');
        //     $book->isbn = Input::get('isbn');
        //     $book->publisher = Input::get('publisher');
        //     $book->edition = Input::get('edition');
        //     $book->faculty = Input::get('faculty');
        //     $book->save();

        //     // redirect
        //     Session::flash('message', 'Successfully created book!');
        //     return Redirect::to('books');
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
        $book = Book::find($id);

        // show the view and pass the nerd to it
        return View::make('books.show')
            ->with('book', $book);
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
