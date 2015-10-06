@extends('layouts.master')

@section('title', 'Share Textbook')
<!-- <script src="js/hyphenate.js"></script> -->

@section('content')
	@parent

	<div class='share-form'>
		<h2>Share Textbook</h2>
		<?php echo $errors->first('isbn');?><br>
		<?php echo $errors->first('edition');?>
		<p>{{Session::get('bookError')}}</p>
		<p>{{Session::get('sharerError')}}</p>
		<form method="POST" action="books" accept-charset="UTF-8" enctype="multipart/form-data">
			<input type="text" name="name" placeholder="Name" required><br>
			<input type="text" name="author" placeholder="Author" required><br>
			<input type="text" name="isbn" placeholder="ISBN" required><br>	
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
			<input type="date" name="due_date" placeholder="Due Date" required><br>
			<label for="fileToUpload">Upload Photo</label>
			<input type="file" name="image" id="image" required><br>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Submit">
		</form>
	</div>
@endsection