@extends('layouts.master')

@section('title', 'Search for Textbook')

@section('content')
	@parent

	<h2>Search for Textbook</h2>

	<form method="POST" action="share">
		<input type="text" name="search" placeholder="Search by Name, Author, ISBN or Faculty"><br>
		<input type="submit" value="Search">
	</form>
@endsection