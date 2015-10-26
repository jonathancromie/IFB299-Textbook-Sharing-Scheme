@extends('layouts.master')

@section('title', 'About Us')

@section('content')
    @parent
    <div id="about">
	    <h2>About Us</h2>
	    <p>
	    	This website allows students studying at Queensland University of Technology to share textbooks with each other free of charge.
	    	The site has been continuously developed over the semester 2 period of 2015. The features incorporated into the site include:
	    </p>
	    <ul class="alt">
    		<li>Share Textbooks</li>
    		<li>Borrow Textbooks</li>
    		<li>Search Textbooks</li>
    		<li>Sort Textbooks</li>
    		<li>Share Feedback</li>
    		<li>Register an Account</li>
    		<li>Login to Account</li>
    		<li>View History</li>
    		<li>Receive Email Alerts</li>
    	</ul> 
	</div>

@endsection