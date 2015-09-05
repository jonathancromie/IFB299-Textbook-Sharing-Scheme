@extends('layouts.master')

@section('title', 'Search for Textbook')

@section('content')
	@parent

	<!-- Banner For Homepage-->
    <!-- <section id="banner">
        <div class="inner">
            <h2>This is Ion</h2>
		    <p>A free responsive template by <a href="http://templated.co">TEMPLATED</a></p>
		    <ul class="actions">
		        <li><a href="#content" class="button big special">Sign Up</a></li>
		        <li><a href="#elements" class="button big alt">Learn More</a></li>
		    </ul>
        </div>
    </section> -->

	<h2>Search for Textbook</h2>

	<form method="POST" action="share">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="author" placeholder="Author"><br>
		<input type="text" name="isbn" placeholder="ISBN"><br>
		<input type="text" name="publisher" placeholder="Publisher"><br>
		<input type="text" name="publisher" placeholder="Edition"><br>
		<select>
			<option value="building">Building and planning</option>
			<option value="business">Business</option>
			<option value="creative">Creative, design and performance</option>
			<option value="education">Education</option>
			<option value="engineering">Engineering</option>
			<option value="health">Health and community</option>
			<option value="it">Information technology</option>
			<option value="languages">Languages</option>
			<option value="law">Law and justice</option>
			<option value="science">Science and mathematics</option>
		</select>	
		<br>
		<input type="submit" value="Search">
	</form>
@endsection