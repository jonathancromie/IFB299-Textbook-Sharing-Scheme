@extends('layouts.master')

<script type="text/javascript" src="http://isbnjs.googlecode.com/svn/trunk/isbn.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/hyphenate.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" type="text/css" />


@section('title', 'Share Textbook')

@section('content')
	@parent

	<div class='share-form'>
		<h2>Share Textbook</h2>
		<?php echo $errors->first('isbn');?>
		<?php echo $errors->first('edition');?>
		<p>{{Session::get('bookError')}}</p>
		<p>{{Session::get('sharerError')}}</p>
		<form method="POST" action="books" accept-charset="UTF-8" enctype="multipart/form-data">
			<input type="text" name="name" placeholder="Name" required><br>
			<input type="text" name="author" placeholder="Author" required><br>
			<span id="isbnspan"></span><br>
			<input type="text" id="isbn" name="isbn" placeholder="ISBN" required><br>	
			<input type="text" name="publisher" placeholder="Publisher" required><br>
			<input type="text" name="edition" placeholder="Edition" required><br>
			<select name="faculty" required>
				<option value="Buidling and Planning">Building and Planning</option>
				<option value="Business">Business</option>
				<option value="Creative, Design and Performance">Creative, Design and Performance</option>
				<option value="Education">Education</option>
				<option value="Engineering">Engineering</option>
				<option value="Health and Community">Health and Community</option>
				<option value="Information Technology">Information Technology</option>
				<option value="Languages">Languages</option>
				<option value="Law and Justice">Law and Justice</option>
				<option value="Science and Mathematics">Science and Mathematics</option>
			</select>	
			<br>
	        <input type="text" class="form-control" id="datetimepicker1" name="pickup_date" placeholder="Pickup Date" required><br>		    
			<input type="text" name="location" placeholder="Pickup Location" required><br>
			<input type="text" class="form-control" id="datetimepicker2" name="due_date" placeholder="Due Date" required><br>
			<input type="file" class="file" name="image" id="image" accept="image/gif, image/jpeg, image/png" required><br>
			<input type="hidden" name="MAX_FILE_SIZE" value="20971520">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Submit">
		</form>
	</div>

<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/datetimepicker.js') }}"></script>


@endsection