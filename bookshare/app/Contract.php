<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $primaryKey = 'contract_id';

	protected $fillable = array('sharer_id', 'borrower_id', 'pickup_date', 'location', 'due_date');

	public function sharer() {
		$this->belongsTo('BookShare\Student');
	}

	public function borrower() {
		$this->belongsTo('BookShare\Student');
	}

	public function book() {
		$this->belongsTo('BookShare\Book');
	}

	public function getFirstName() {
		$students = Student::where('student_id', '=', $this->sharer_id)->get();
		foreach ($students as $student) {
			$first_name = $student->first_name;
		}
		return $first_name;
	}

	public function getLastName() {
		$students = Student::where('student_id', '=', $this->sharer_id)->get();
		foreach ($students as $student) {
			$last_name = $student->last_name;
		}
		return $last_name;
	}

	public function getBook() {
		$books = Book::where('book_id', '=', $this->book_id)->get();
		foreach ($books as $book) {
			$book_name = $book->name;
		}
		return $book_name;
	}
}
