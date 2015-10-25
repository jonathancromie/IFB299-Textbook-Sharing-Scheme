@extends('layouts.master')

@section('content')
@parent
<p>
	Hey {{ $first_name }},

	Welcome to ShareBook!

	Now you're able to share and borrow books with other students at QUT.

	If you have any questions, please reply to this email.
</p>
@endsection