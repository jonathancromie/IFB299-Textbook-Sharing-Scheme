<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = array('photo');

    public function book() {
    	return $this>belongsToOne('Book');
    }
}
