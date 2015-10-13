<!-- Error box style  -->
<style>
p.error_msg {
	color:#4A4A5C;
	font-family:courier;
	text-align:center;
    border-style: solid;
    border-color: #0000ff;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
}
</style>

<!--Validate email and password stregnth  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/Qutemails.js') }}"></script>
<script src="{{ asset('js/password-strength.js') }}"></script>

@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    @parent

    <h2>Register</h2>
    <!-- error msg -->            
   <div id="errors" style="display:none;">
   <p class="error_msg" > Errors: Please Enter your QUT email only. </p>
   </div>

    <!-- Start form -->  
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
