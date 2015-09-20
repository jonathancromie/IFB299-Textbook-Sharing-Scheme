<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = array('name', 'author', 'isbn', 'publisher', 'edition', 'faculty', 'image');

	public function photo() {
    	return $this>belongsToOne('Photo');
    }
}
