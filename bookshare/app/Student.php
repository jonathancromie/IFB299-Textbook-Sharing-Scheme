<?php

namespace BookShare;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = array('first_name', 'last_name', 'sex', 'dob', 'phone', 'street', 'suburb', 'post_code', 'state', 'password');
}
