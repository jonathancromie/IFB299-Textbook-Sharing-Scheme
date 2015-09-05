@extends('layouts.master')

@section('title', 'Share Textbook')

@section('content')
    @parent
	<table>
    <thead>
        <tr>
            <td>ID</td>
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
            <td>{{ $value->book_id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->author }}</td>
            <td>{{ $value->isbn }}</td>
            <td>{{ $value->publisher }}</td>
            <td>{{ $value->edition }}</td>
            <td>{{ $value->faculty }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <!-- <<td>
                <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>
@endsection