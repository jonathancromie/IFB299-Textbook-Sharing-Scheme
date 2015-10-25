<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;
use BookShare\Http\Requests;
use BookShare\Http\Controllers\Controller;
use Auth;
use BookShare\Student;
use BookShare\Contract;
use BookShare\Book;
use Mail;
use DateTime;

class ContractController extends Controller
{
    public function insertBorrower($id) {

        $borrower_id = Auth::user()->student_id;        
        $contract = Contract::where('contract_id', $id)->first();
        $contract->borrower_id = $borrower_id;
        $contract->save();

        Mail::send('emails.success', ['contract' => $contract], function ($m) use ($contract) {
            $m->to(Auth::user()->email, Auth::user()->first_name)->subject('Successfully Borrowed Textbook!');
        });

        $due_date = new DateTime($contract->due_date);
        $reminder_date = $due_date->modify('-1 Week');

        Mail::later($reminder_date, 'emails.reminder', ['contract' => $contract], function ($m) use ($contract) {
            $m->to(Auth::user()->email, Auth::user()->first_name)->subject('Due Date Reminder');
        });

        \Log::info($reminder_date->format('Y-m-d H:i:s'));

        $book = Book::where('book_id', $contract->book_id);
        // \Log::info($book->book_id);
        $book->delete();

        \Session::flash('message', 'Successfully borrowed textbook!');  
        return view('index');

    }
}
