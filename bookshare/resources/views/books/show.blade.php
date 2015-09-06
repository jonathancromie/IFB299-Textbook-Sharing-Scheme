@extends('layouts.master')

@section('title', 'Search Results')

@section('content')
    @parent

    <h2>{{ $book->name }}</h2>

    <p>
	    <strong>Author:</strong> {{ $book->author }}<br>
        <strong>ISBN:</strong> {{ $book->isbn }}<br>
        <strong>Publisher:</strong> {{ $book->publisher }}<br>
        <strong>Edition:</strong> {{ $book->edition }}<br>
        <strong>Faculty:</strong> {{ $book->faculty }}
    </p>

@endsection