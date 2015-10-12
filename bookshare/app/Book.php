<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $primaryKey = 'book_id';
	protected $fillable = array('name', 'author', 'isbn', 'publisher', 'edition', 'faculty', 'image');

	public function contract() {
		$this->hasMany('BookShare\Contract');
	}

	public function student() {
		$this->belongsTo('BookShare\Student');
	}
}
