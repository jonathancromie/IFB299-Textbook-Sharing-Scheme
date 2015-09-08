@extends('layouts.master')

@section('title', 'Hire Textbook')

@section('content')
    @parent
    <h2>Hire Textbook</h2>
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

            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">Hire this textbook</a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
@endsection