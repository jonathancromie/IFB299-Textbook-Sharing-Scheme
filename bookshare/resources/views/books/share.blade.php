@extends('layouts.master')

@section('title', 'Share Textbook')

@section('content')
	@parent

	<div class='share-form'>
		<h2>Share Textbook</h2>
		<form method="POST" action="books" accept-charset="UTF-8">
			<input type="text" name="name" placeholder="Name" required><br>
			<input type="text" name="author" placeholder="Author" required><br>
			<input type="text" name="isbn" placeholder="ISBN" required><br>
			<input type="text" name="publisher" placeholder="Publisher" required><br>
			<input type="text" name="publisher" placeholder="Edition" required><br>
			<select required>
				<option value="building">Building and Planning</option>
				<option value="business">Business</option>
				<option value="creative">Creative, Design and Performance</option>
				<option value="education">Education</option>
				<option value="engineering">Engineering</option>
				<option value="health">Health and Community</option>
				<option value="it">Information Technology</option>
				<option value="languages">Languages</option>
				<option value="law">Law and Justice</option>
				<option value="science">Science and Mathematics</option>
			</select>	
			<br>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Submit">
		</form>
	</div>
@endsection