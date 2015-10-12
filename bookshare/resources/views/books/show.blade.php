@extends('layouts.master')

@section('title', 'Borrow Textbook')

@section('content')
    @parent
    <h2>More Information</h2> 
    <h1>Book Information</h1>
    <table>   	
		<thead>
	        <tr>
	            <td>Name</td>
	            <td>Author</td>
	            <td>ISBN</td>
	            <td>Publisher</td>
	            <td>Edition</td>
	            <td>Faculty</td>
	            <td>Image</td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($information as $key => $value)
		        <tr>
		            <td>{{ $value->name }}</td>
		            <td>{{ $value->author }}</td>
		            <td>{{ $value->isbn }}</td>
		            <td>{{ $value->publisher }}</td>
		            <td>{{ $value->edition }}</td>
		            <td>{{ $value->faculty }}</td>
		            <td><img src="{{ URL::to('uploads/' . $value->image) }}" alt="{{ $value->book_id }}"/></td>
		        </tr>
	        @endforeach
	    </tbody>	    
    <table> 
    <h1>Sharer Information</h1>
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
		                <a class="btn btn-small btn-success" href="{{ URL::to('borrow/'. $value->contract_id) }}">Borrow</a>
		            </td>
		        </tr>
	        @endforeach
	    </tbody>	    
    <table>    
@endsection