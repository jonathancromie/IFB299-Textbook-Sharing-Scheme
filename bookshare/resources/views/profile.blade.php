@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    @parent
    <h2>Profile</h2>

    <h1> Sara</h1>
	<ul>
		<li><a href="link">Add book</a></li>
  		<li><a href="link"> History</a></li>
  		<li><a href="link">Feedback</a></li>
	</ul>
	<P> Here is the users review of you </p>


	<!-- <table>
	    <thead>
	        <tr>
	            <td>Book</td>
	            <td>Sharer</td>	  
	            <td>Pickup Location</td>          
	            <td>Due Date</td>
	        </tr>
	    </thead>
	    <tbody>

		@foreach($contract as $key => $value)
	    <tr>
	    	<td>{{ $value->name }}</td>
	        <td>{{ $value->first_name}} {{$value->last_name}}</td>	
	        <td>Library</td>
	        <td>{{ $value->due_date }}</td>
	    </tr>
	    @endforeach
        </tbody>
	</table> -->

@endsection