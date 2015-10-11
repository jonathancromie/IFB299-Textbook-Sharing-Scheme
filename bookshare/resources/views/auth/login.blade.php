@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @parent   

    <h2>Login</h2>

    <form method="POST" action="login">
        {!! csrf_field() !!}

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required><br>
        <input type="password" name="password" id="password" placeholder="Password" requireed><br>
        <input type="checkbox" name="remember">Remember me<br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Login"></input><br><br>

        <a href="login/facebook">Login in with Facebook</a>
    </form>

    <p>Not registered yet? <a href="register">Click here</a> </p>
@endsection