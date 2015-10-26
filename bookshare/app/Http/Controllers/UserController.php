<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;
use BookShare\Http\Requests;
use BookShare\Http\Controllers\Controller;
use BookShare\Student;
use BookShare\Contract;
use View;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile()
    {
        $student_id = \Auth::user()->student_id;
        $borrower = \DB::table('students')
                    ->select('students.*', 'books.*', 'contracts.*')
                    ->join('books', 'students.student_id', '=', 'books.student_id')
                    ->join('contracts', function($join) use($student_id) {
                        $join->on('books.book_id', '=', 'contracts.book_id')
                            ->where('contracts.borrower_id', '=', $student_id);
                    })
                    ->get();
        $sharer = \DB::table('students')
                    ->select('students.*', 'books.*', 'contracts.*')
                    ->join('books', 'students.student_id', '=', 'books.student_id')
                    ->join('contracts', function($join) use($student_id) {
                        $join->on('books.book_id', '=', 'contracts.book_id')
                            ->where('contracts.sharer_id', '=', $student_id);
                    })
                    ->get();

        return View::make('users.profile')->with('borrower', $borrower)->with('sharer', $sharer);
    }
}
