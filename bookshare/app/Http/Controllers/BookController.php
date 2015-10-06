<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;

use BookShare\Http\Requests;
use BookShare\Http\Controllers\BookController;

use Illuminate\Support\Facades\Validator;
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
use Auth;
use Input;

class BookController extends Controller
{
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
                                        'due_date' => trim($request->get('due_date'))
                                        ]);

            $book->save();

            $user = Auth::user();
            \Log::info($user->email);
            $book_id = $book->book_id;

            $due_date = $book->due_date;

            \Log::info($book->due_date);

            $contract = Contract::firstOrCreate(['sharer_email' => $user->email,
                                                'book_id' => $book_id,
                                                'due_date' => $due_date
                                                ]); 
            $contract->save();

            $image = Input::file('image');
            $extension = $image->getClientOriginalExtension();
            $book_id = $book->book_id;
            // $filename  = $book_id . '.' . $extension;
            $filename = $book_id;
            $path = public_path('uploads/' . $filename);
            Image::make($image->getRealPath())->resize(50, 67)->save($path);
            // $book->image = 'uploads/'.$filename;
            $book->image = $filename;
            $book->save();

            // redirect
            return Redirect::to('index');
            Session::flash('message', 'Successfully created book!');             
        }            
    }
}
