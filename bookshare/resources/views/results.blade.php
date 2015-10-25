@extends('layouts.master')

<script src="{{ asset('js/sorttable.js') }}"></script>

@section('title', 'Borrow Textbook')

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
                <td>More Information</td>
            </tr>
        </thead>
        <tbody>
            @foreach($information as $key => $value)
                <tr>
                    <td>{{ $value->book_id }}</td>
                    <td>{{ $value->author }}</td>
                    <td>{{ $value->isbn }}</td>
                    <td>{{ $value->publisher }}</td>
                    <td>{{ $value->edition }}</td>
                    <td>{{ $value->faculty }}</td>
                    <td><img src="{{ URL::to('uploads/' . $value->image) }}" alt="{{ $value->book_id }}"/></td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">More Information</a>
                    </td>

                </tr>
            @endforeach
        </tbody>        
    <table> 
    <!-- <h1>Sharer Information</h1>
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
    <table>   -->  
@endsection