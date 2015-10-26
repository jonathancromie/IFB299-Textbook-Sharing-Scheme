@extends('layouts.master')

<script src="{{ asset('js/sorttable.js') }}"></script>

@section('title', 'More Information')

@section('content')
    @parent
    <h2>More Information</h2> 
    <h1>Book Information</h1>
    <table class="sortable">  	
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
	            <td>Pickup Date</td>
	            <td>Pickup Location</td>
	            <td>Due Date</td>
	            <td>Borrow</td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($information as $key => $value)	
		        <tr>
		            <td>{{ $value->first_name}} {{$value->last_name}}</td>
		            <td>{{ $value->pickup_date }}</td>
		            <td>{{ $value->location }}</td>
		            <td>{{ $value->due_date }}</td>
		            <td>
		            	@if (Auth::check())
			                <a class="btn btn-small btn-success" href="{{ URL::to('borrow/'. $value->contract_id) }}">Borrow</a>
			            @else
			            	<a class="btn btn-small btn-success" href="login">Borrow</a>
			            @endif

		            </td>
		        </tr>
	        @endforeach
	    </tbody>	    
    <table>    

	<!-- Star Rating -->
  	<div class="rw-ui-container"></div>
  	<!-- feedback  -->
  	<!-- begin wwww.htmlcommentbox.com -->
  	<div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Form</a> is loading comments...</div>
  	<!-- <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" /> -->
  	<link rel="stylesheet" href="{{ asset('css/twitter-bootstrap.css') }}" type="text/css" />
    <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1445797376758");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
	<!-- end www.htmlcommentbox.com -->
@endsection