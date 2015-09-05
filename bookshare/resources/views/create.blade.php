<!DOCTYPE html>
<html>
<head>
    <title>Create Book</title>
</head>
<body>

<h1>Share Book</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'nerds')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', Input::old('author'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('isbn', 'ISBN') }}
        {{ Form::text('isbn', Input::old('isbn'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('publisher', 'Publisher') }}
        {{ Form::text('publisher', Input::old('publisher'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('edition', 'Edition') }}
        {{ Form::text('edition', Input::old('edition'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('faculty', 'Faculty') }}
        {{ Form::select('faculty', array('0' => 'Select a Level',
                                        '1' => 'Building and Planning',
                                        '2' => 'Business',
                                        '3' => 'Creative, Design and Performance'),
                                        '4' => 'Education'),
                                        '5' => 'Engineering'),
                                        '6' => 'Health and Community'),
                                        '7' => 'Information Technology'),
                                        '8' => 'Languages'),
                                        '9' => 'Law and Justice'),
                                        '10' => 'Science and Mathematics'),
                                        Input::old('faculty'),
                                        array('class' => 'form-control')) 
        }}
    </div>

    {{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</body>
</html>