<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $fillable = array('sharer_id', 'borrower_id', 'book_id', 'due_date');
}
