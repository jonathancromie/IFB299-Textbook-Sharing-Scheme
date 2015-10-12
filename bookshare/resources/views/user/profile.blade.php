@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    @parent
    <h2>Profile</h2> 

    <!-- If user is not logged in -->

    <h1>Basic Information</h1>

    <table>
    	<thead>
    		<tr>
    			<td>Given Name</td>
    			<td>Surname</td>
    			<td>Sex</td>
    			<td>Date of Birth</td>
    			<td>Edit</td>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>{{ Auth::user()->first_name }}</td>
    			<td>{{ Auth::user()->last_name }}</td>
    			<td>{{ Auth::user()->sex }}</td>
    			<td>{{ Auth::user()->dob }}</td>
    			<td>
	                <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a>
	            </td>
    		</tr>
    	</tbody>
    </table>

    <h1>Contact Information</h1>

    <table>
    	<thead>
    		<tr>
    			<td>Email Address</td>
    			<td>Phone Number</td>
    			<td>Street</td>
    			<td>Suburb</td>
    			<td>Post Code</td>
    			<td>State</td>
    			<td>Edit</td>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>{{ Auth::user()->email }}</td>
    			<td>{{ Auth::user()->phone }}</td>
    			<td>{{ Auth::user()->street }}</td>
    			<td>{{ Auth::user()->suburb }}</td>
    			<td>{{ Auth::user()->post_code }}</td>
    			<td>{{ Auth::user()->state }}</td>
    			<td>
	                <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a>
	            </td>
    		</tr>
    	</tbody>
    </table>

    <h1>Borrowed Books</h1>   
    <table>
        <thead> 
            <tr>
                <td>Book</td>
                <td>Due Date</td>
                <td>Pickup Location</td>
                <td>More Information</td>
            </tr>
        </thead>
        <tbody>
            @foreach($contract as $key => $value)
                <tr>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->due_date }}</td>
                    <td>{{ $value->location }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">More Information</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection