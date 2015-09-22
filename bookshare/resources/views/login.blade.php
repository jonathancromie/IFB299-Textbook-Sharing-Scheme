@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @parent
    <h2>Login</h2>
	<form action="pro.php" method="post">
        <fieldset>
        <legend> Registered Users</legend>
		User name: <input type="text" name="username"/> <br/>
		Password: <input type="password" name="password"/> <br/>	
		<input type="submit" name="login" value="Login"/>
		</fieldset>
    </form>
<<<<<<< HEAD

    <p> Not registered yet? <a href="signup">Click here</a> </p>
=======
>>>>>>> jcromie
@endsection