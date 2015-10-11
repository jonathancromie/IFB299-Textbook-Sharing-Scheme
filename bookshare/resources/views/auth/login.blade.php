@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @parent

    <!--    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "localhost/ifb299/bookshare/public/login/facebook";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    -->    

    <h2>Login</h2>

    <form method="POST" action="login">
        {!! csrf_field() !!}

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required><br>
        <input type="password" name="password" id="password" placeholder="Password" requireed><br>
        <input type="checkbox" name="remember"> Remember Me<br>
        <input type="submit" value="Login"></input><br><br>

        <!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true"></div> -->

        <a href="login/facebook">Login in with Facebook</a>
    </form>

    <p>Not registered yet? <a href="register">Click here</a> </p>
@endsection