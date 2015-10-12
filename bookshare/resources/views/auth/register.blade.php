@extends('layouts.master')

<!--Validate email and password stregnth  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/Qutemails.js') }}"></script>
<script src="{{ asset('js/password-strength.js') }}"></script>

@section('title', 'Sign Up')

@section('content')
    @parent

    <h2>Register</h2>

    <form method="POST" action="register"onSubmit="return checkbae()">
        {!! csrf_field() !!}

        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" required><br>
        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required><br>
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required><br> 
        <select name="sex" value="{{ old('sex') }}" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <input type="date" name="dob" value="{{ old('dob') }}" placeholder="Date of Birth" required><br>
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required><br>
        <input type="text" name="street" value="{{ old('street') }}" placeholder="Street" required><br>
        <input type="text" name="suburb" value="{{ old('suburb') }}" placeholder="Suburb" required><br>
        <input type="text" name="post_code" value="{{ old('post_code') }}" placeholder="Post Code" required><br>
        <select name="state" value="{{ old('state') }}" required>
            <option value="ACT">ACT</option>
            <option value="NSW">NSW</option>
            <option value="NT">NT</option>
            <option value="QLD">QLD</option>
            <option value="SA">SA</option>
            <option value="VIC">VIC</option>
            <option value="WA">WA</option>
        </select><br>
        <span id="passstrength"></span><br>
        <input type="password" name="pass" id="password" placeholder="Password" required><br>		
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
        <input type="submit" value="Register">
    </form>

    <p>Already a member? <a href="login">Click here</a> </p>
@endsection
