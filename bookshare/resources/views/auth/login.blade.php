@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @parent

    <h2>Login</h2>
	
    <!-- resources/views/auth/login.blade.php -->

    <form method="POST" action="login">
        {!! csrf_field() !!}

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="checkbox" name="remember"> Remember Me<br>
        <input type="submit" value="Login"></input>
    </form>

    <p>Not registered yet? <a href="register">Click here</a> </p>
@endsection