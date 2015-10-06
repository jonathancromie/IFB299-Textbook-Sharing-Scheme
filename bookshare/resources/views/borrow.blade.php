@extends('layouts.master')

@section('title', 'Borrow Textbook')

@section('content')
    @parent
    <h2>Borrow Textbook</h2>
	<table>
    <thead>
        <tr>
            <!-- <td>ID</td> -->
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
    @foreach($books as $key => $value)
        <tr>
            <!-- <td>{{ $value->book_id }}</td> -->
            <td>{{ $value->name }}</td>
            <td>{{ $value->author }}</td>
            <td>{{ $value->isbn }}</td>
            <td>{{ $value->publisher }}</td>
            <td>{{ $value->edition }}</td>
            <td>{{ $value->faculty }}</td>
            <td><img src="{{ URL::to('uploads/' . $value->image . '.png') }}" alt="{{ $value->book_id }}"/></td>

            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">Borrow this textbook</a>
            </td>

        </tr>
    @endforeach
    </tbody>
    </table>
@endsection