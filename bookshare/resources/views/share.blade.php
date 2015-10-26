@extends('layouts.master')

<!-- <script type="text/javascript" src="http://isbnjs.googlecode.com/svn/trunk/isbn.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/isbn.js') }}"></script>
<script src="{{ asset('js/hyphenate.js') }}"></script>
<script src="{{ asset('js/author.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" type="text/css" />

<!-- Input Validation -->

        <link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />

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
                jQuery("#Email").validate({
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
	<script src="{{ asset('js/jquery-1.3.2.js') }}">
	</script>
	<script src="{{ asset('js/jquery.validate.js') }}">
	</script>
	<script src="{{ asset('js/jquery.validation.functions.js') }}">
	</script>
	
@section('title', 'Share Textbook')

@section('content')
	@parent

	<div class='share-form'>
		<h2>Share Textbook</h2>
		<?php echo $errors->first('isbn');?>
		<?php echo $errors->first('edition');?>
		<p>{{Session::get('bookError')}}</p>
		<p>{{Session::get('sharerError')}}</p>
		        </br> 
            
            <form method="POST" action="books" accept-charset="UTF-8" class="AdvancedForm" enctype="multipart/form-data">
			<input type="text" name="name" id="ValidField"  placeholder="Name" required><br>
			<input type="text" id="author" name="author" id="ValidField" placeholder="Author" required><br> <!-- can be deleted? -->
			<span id="edit" onclick="edit();"></span><br>
			<span id="isbnspan"></span><br>
			<input type="text" id="isbn" name="isbn" placeholder="ISBN" required><br> <!-- changed id -->
			<input type="text" id="publisher" name="publisher" placeholder="Publisher" required><br>
			<input type="text" id="edition" name="edition" placeholder="Edition" required><br>
			<select name="faculty" id="ValidSelection" required>
			    <option value="0">Make a Selection</option>
				<option value="Buidling and Planning">Building and Planning</option>
				<option value="Business">Business</option>
				<option value="Creative, Design and Performance">Creative, Design and Performance</option>
				<option value="Education">Education</option>
				<option value="Engineering">Engineering</option>
				<option value="Health and Community">Health and Community</option>
				<option value="Information Technology">Information Technology</option>
				<option value="Languages">Languages</option>
				<option value="Law and Justice">Law and Justice</option>
				<option value="Science and Mathematics">Science and Mathematics</option>
			</select>	
			<br>
	        <input type="text" class="form-control" id="datetimepicker1" name="pickup_date" placeholder="Pickup Date" required><br>		    
			<input type="text" name="location" id="location" placeholder="Pickup Location" required><br>
			<input type="text" class="form-control" id="datetimepicker2" name="due_date" placeholder="Due Date" required><br>
			<input type="file" class="file" name="image" id="image" accept="image/gif, image/jpeg, image/png" required><br>
			<input type="hidden" name="MAX_FILE_SIZE" value="20971520">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Submit" onclick="edit();">
		</form>
	</div>

<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/datetimepicker.js') }}"></script>

<!-- validation -->
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

@endsection
