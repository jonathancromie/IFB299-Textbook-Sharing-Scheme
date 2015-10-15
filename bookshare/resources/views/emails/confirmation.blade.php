@extends('layouts.master')

@section('content')
@parent
<p>
	Hey {{ $first_name }},

	You are now successfully borrowing this book.

	If you have any questions, please reply to this email.
</p>
@endsection