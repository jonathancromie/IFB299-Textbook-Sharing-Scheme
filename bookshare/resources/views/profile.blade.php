@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    @parent
    <h2>Profile</h2>
	<table>
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
	</table>

@endsection