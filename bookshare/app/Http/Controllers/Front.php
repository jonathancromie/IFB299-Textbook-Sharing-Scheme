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
use Auth;
use DB;
use Mail;

use BookShare\Contract;
use BookShare\Student;

use BookShare\Sharer;

class Front extends Controller
{
    public function index() {

        $student = Student::findOrFail(20);

        \Log::info($student);

        Mail::send('emails.reminder', ['student' => $student], function ($m) use ($student) {
            $m->to($student->email);
            $m->from('sharebookqut@gmail.com');
            $m->subject('Your Reminder!');
        });

        return view('index', array('page' => 'index'));
    }

    public function share() {
        return view('share', array('page' => 'share'));
    }

    public function borrow() {
        $books = Book::all();
        return View::make('borrow')->with('books', $books);
    }

    public function search() {
        return view('search', array('page' => 'search'));
    }

    public function results() {
        // $books = Book::where('name', 'LIKE', Input::get('search'), 'AND', 'author', 'LIKE', Input::get('search'), 'AND', 'isbn', 'LIKE', Input::get('search'))->get();
        // $books = Book::whereRaw('name like ', Input::get('search'), array(25))->get();

        $search = Input::get('search');
        $query = '%'.$search.'%';

        // $books = Book::where('name', 'like', $query)
        //                 ->orWhere('author', 'like', $query)
        //                 ->orWhere('isbn', 'like', $query)
        //                 ->orWhere('faculty', 'like', $query)->get();

        // return View::make('results')->with('books', $books);

        $information = DB::table('students')
                    ->select('students.*', 'books.*', 'contracts.*')
                    ->join('books', 'students.student_id', '=', 'books.student_id')
                    ->join('contracts', function($join) use($query) {
                        $join->on('books.book_id', '=', 'contracts.book_id')
                            ->where('books.name', 'like', $query)
                            ->orWhere('books.author', 'like', $query)
                            ->orWhere('books.isbn', 'like', $query)
                            ->orWhere('books.faculty', 'like', $query);
                    })
                    ->get();
        return View::make('results')->with('information', $information);
    }

    public function about() {
        return view('about', array('page' => 'about'));
    }

    public function help() {
        return view('help', array('page' => 'help'));
    }

    public function faq() {
        return view('faq', array('page' => 'faq'));
    }

    public function terms() {
        return view('terms', array('page' => 'terms'));
    }

    // public function blog() {
    //     return 'blog page';
    // }

    // public function blog_post($id) {
    //     return 'blog post page';
    // }

    // public function contact_us() {
    //     return 'contact us page';
    // }
}
