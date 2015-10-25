<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $primaryKey = 'book_id';
	protected $fillable = array('name', 'author', 'isbn', 'publisher', 'edition', 'faculty', 'image');

	public function contract() {
		$this->hasMany('BookShare\Contract');
	}

	public function student() {
		$this->belongsTo('BookShare\Student');
	}
}
