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

<!--Validate QUT email and password stregnth  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/Qutemails.js') }}"></script>
<script src="{{ asset('js/password-strength.js') }}"></script>

<!-- Validate Form -->
<link rel="stylesheet" href="{{ asset('css/jquery.validate.css') }}" type="text/css" /> 
<link rel="stylesheet" href="{{ asset('css/Vstyle.css') }}" type="text/css" /> 
<script src="{{ asset('js/jquery-1.3.2.js') }}">
</script>
<script src="{{ asset('js/jquery.validate.js') }}">
</script>
<script src="{{ asset('js/jquery.validation.functions.js') }}">
</script>
<script type="text/javascript">

        <script type="text/javascript">
        
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#ValidField").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#ValidNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                jQuery("#phone").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });

                jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });

                jQuery("#ValidConfirmPassword").validate({
                    expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",
                    message: "Confirm password field doesn't match the password field"
                });
                jQuery("#ValidSelection").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#state").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });

				jQuery('.AdvancedForm').validated(function(){
					alert("Use this call to make AJAX submissions.");
				});
            });
            /* ]]> */
        </script>
        
        
@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    @parent

    {{Session::get('message')}}

    <h2>Register</h2>

    <!-- error msg -->            
   <div id="errors" style="display:none;">
   <p class="error_msg" > Errors: Please Enter your QUT email only. </p>
   </div>

    <!-- Start form -->  
    <form method="POST" action="register"onSubmit="return checkbae()">
        {!! csrf_field() !!}

        <!-- <span id="emailspan"></span><br> -->
        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required><br>
        <input type="text" name="first_name" id="ValidField"  value="{{ old('first_name') }}" placeholder="First Name" required><br>       
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required><br>
        <select name="sex" id="ValidSelection" value="{{ old('sex') }}" required>
            <option value="0">Make a Selection</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <input type="date" name="dob" value="{{ old('dob') }}" placeholder="Date of Birth" required><br>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required><br>
        <input type="text" name="street" value="{{ old('street') }}" placeholder="Street" required><br>
        <input type="text" name="suburb" value="{{ old('suburb') }}" placeholder="Suburb" required><br>
        <input type="text" id="ValidNumber" name="post_code" value="{{ old('post_code') }}" placeholder="Post Code" required><br>
        <select name="state" id="state" value="{{ old('state') }}" required>
            <option value="ACT">ACT</option>
            <option value="NSW">NSW</option>
            <option value="NT">NT</option>
            <option value="QLD">QLD</option>
            <option value="SA">SA</option>
            <option value="VIC">VIC</option>
            <option value="WA">WA</option>
        </select><br>
        <span id="passstrength"></span><br>
        <input type="password" name="password" id="password" placeholder="Password" required><br>		
        <input type="password" id="ValidConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required><br>
        <input type="checkbox" name="agreed" value="1"  required> By submitting this I agree to Bookshare <a href=" ">Terms and conditions.</a>

        <input type="submit" value="Register">
    </form>

    <p>Already a member? <a href="login">Click here</a> </p>
@endsection

<!-- validations -->

        </div>
        <script type="text/javascript">
            /* <![CDATA[ */
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
            /* ]]> */
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            try {
                var pageTracker = _gat._getTracker("UA-10628239-1");
                pageTracker._trackPageview();
            } 
            catch (err) {
            }
            /* ]]> */
        </script>
