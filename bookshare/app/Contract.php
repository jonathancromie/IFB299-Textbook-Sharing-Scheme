<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $primaryKey = 'contract_id';

	protected $fillable = array('sharer_id', 'borrower_id', 'due_date', 'location');

	public function sharer() {
		$this->belongsTo('BookShare\Student');
	}

	public function borrower() {
		$this->belongsTo('BookShare\Student');
	}

	public function book() {
		$this->belongsTo('BookShare\Book');
	}
}
