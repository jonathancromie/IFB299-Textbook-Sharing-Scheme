<html>
<head>

</head>

<body>
	<table class="table table-striped table-bordered">
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
        </tr>
    @endforeach
    </tbody>
</table>
</body>