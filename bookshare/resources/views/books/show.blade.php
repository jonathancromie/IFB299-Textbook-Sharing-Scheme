@extends('layouts.master')

@section('title', 'Borrow Textbook')

@section('content')
    @parent
    <h2>More Information</h2> 
    <table>   	
		<thead>
	        <tr>
	            <td>Sharer</td>
	            <td>Due Date</td>
	            <td>Pickup Location</td>
	            <td>Borrow</td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($information as $key => $value)
		        <tr>
		            <td>{{ $value->first_name}} {{$value->last_name}}</td>
		            <td>{{ $value->due_date }}</td>
		            <td>{{ $value->location }}</td>
		            <td>
		                <a class="btn btn-small btn-success" href="{{ URL::to('borrow/'. $value->student_id . '/' . $value->book_id) }}">Borrow</a>
		            </td>
		        </tr>
	        @endforeach
	    </tbody>	    
    <table>    
@endsection