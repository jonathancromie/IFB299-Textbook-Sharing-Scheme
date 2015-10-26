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

        $student = Student::where('student_id', $borrower_id)->first();

        $data = array(
            'email' => $student->email,
            'fist_name' => $student->first_name,
        );

        Mail::send('emails.success', $data, function($message) use ($data){
            $message->from('sharebookqut@gmail.com', 'ShareBook');
            $message->to($data['email']);
            $message->subject('Successfully Borrowed Textbook!');
        });

        $due_date = new DateTime($contract->due_date);
        $reminder_date = $due_date->modify('-1 Week');
        $today = new DateTime("now");        
        $interval =  $reminder_date->getTimestamp() - $today->getTimestamp();

        \Log::info(gettype($interval));

        

        Mail::later($interval, 'emails.reminder', $data, function($message) use ($data){
            $message->from('sharebookqut@gmail.com', 'ShareBook');
            $message->to($data['email']);
            $message->subject('Due Date Reminder');
        });

        $book = Book::where('book_id', $contract->book_id);
        $book->delete();

        \Session::flash('message', 'Successfully borrowed textbook!');  
        return view('index');

    }
}
