<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;
use BookShare\Http\Requests;
use BookShare\Http\Controllers\Controller;
use Auth;
use BookShare\Student;
use BookShare\Contract;
use Mail;

class ContractController extends Controller
{
    public function insertBorrower($id) {

        $borrower_id = Auth::user()->student_id;        
        $contract = Contract::where('contract_id', $id)->first();
        $contract->borrower_id = $borrower_id;
        $contract->save();

        Mail::send('emails.success', ['contract' => $contract], function ($m) use ($contract) {
            $m->to(Auth::user()->email, Auth::user()->first_name)->subject('Successfully borrowed textbook!');
        });

        \Session::flash('message', 'Successfully borrowed textbook!');  
        return view('index');

    }
}
