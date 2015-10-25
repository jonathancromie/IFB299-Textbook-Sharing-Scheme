@extends('layouts.master')

@section('content')
@parent
<p>
	Hey {{ Auth::user()->first_name }},
 
	Congratulations, you have successfully borrowed {{ $contract->getFirstName() }}'s book, {{ $contract->getBook() }}!

	See below for details.

	If you have any questions, please reply to this email.
</p>

<table>   	
	<thead>
        <tr>
            <td>Sharer</td>
            <td>Due Date</td>
            <td>Pickup Location</td>
        </tr>
    </thead>
    <tbody>	
        <tr>
            <td>{{ $contract->getFirstName() }} {{ $contract->getLastName() }}</td>
            <td>{{ $contract->due_date }}</td>
            <td>{{ $contract->location }}</td>
        </tr>
    </tbody>
</table>
@endsection