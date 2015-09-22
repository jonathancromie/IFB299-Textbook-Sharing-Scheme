<!DOCTYPE html>
<html>
<head>
       <!-- initialising the style sheet-->
	   <link rel="stylesheet" type="text/css" href="css/Main.css" media="all" />   
</head>
<body>
<div class="gridcontainer">
    <div class="gridwrapper">
        <div class="gridbox gridheader">
            <div class="header">
		    <!-- Header -->
			<?php include("Include/Header.html");?>
            </div>
        </div>
        <div class="gridbox gridmenu">
		    <!-- Navigation menu -->            
			<?php include("Include/navigation.php");?> 
        </div>
        <div class="gridbox gridmain">
            <div class="main">
            
			<h2>Please fell in your information</h2>

            <form method="post" name="form" action="register.php" onsubmit="return validateForm()">
                <fieldset>
                    <legend>Person Details</legend>
                    <div class="field">
                        <label for="username">User Name:</label>
                        <input class="small" type="text" name="username"/>
                    </div>
                    <div class="field">
                        <label for="password">Password:</label>
                        <input class="small" type="password" name="password" maxlength="15" />
                    </div>
                    <div class="field">
                        <label for="password">Repeat Password:</label>
                        <input class="small" type="password" name="repeat_password" maxlength="15" />
                    </div>
                    <div class="field">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname"/>
                    </div>
                    <div class="field">
                        <label for="last name">Last Name:</label>
                        <input type="text" name="lastname"/>
                    </div>
                    <div class="field">	
                        <label for="malefemale1">Sex:(optional)</label>
                        <input class="radio" type="radio"  value="Male" name="gender"/>Male<input class="radio" type="radio" name="gender" value="Female"/>Female
                    </div>
                    <div class="field">
                        <label for="email">Email Address:</label>
                        <input type="text" name="email" placeholder=" @qut.com"/>
                    </div>			         
                    <div class="field">
                        <label for="email">Date of birth:</label>
                        <input type="text" name="birthdate" placeholder="dd/mm/yyyy"/>                       
                    </div>			                           
                    <div class="field">
                        <!-- Heading used to separate address fields for ease of use -->
                        <p class="formheading"><strong>Residential Address</strong></p>
                        <label for="streetno">Street Number:</label>
                        <input class="small" type="text" name="streetno"/>
                    </div>
                    <div class="field">
                        <label for="streetname">Street Name:</label>
                        <input type="text" name="streetname"/>
                    </div>
                    <div class="field">
                        <label for="streettype">Street Type:</label>
                        <input class="small" type="text" name="streettype"/>
                    </div>
                    <div class="field">
                        <label for="suburb">Suburb:</label>
                        <input class="small" type="text" name="suburb"/>
                    </div>
                    <div class="field">
                        <label for="postcode">Postcode:</label>
                        <input class="small" type="text" name="postcode"/>
                    </div>
                    <div class="field">
                        <label for="state">State:</label>
                        <select name="state">
                            <option>Please Select</option>
                            <option>New South Wales</option>
                            <option>Queensland</option>
                            <option>Victoria</option>
                            <option>Australia Capital Territory</option>
                            <option>South Australia</option>
                            <option>Western Australia</option>
                            <option>Northern Territory</option>
                        </select><br />
                    </div> 
                    <input type="checkbox" name="agree" value="yes"> I agree to terms and conditions<br><a href="terms.php"> View terms and conditions </a>                         
                    </br>
                    <div class="field" align="center">
                        <input class="button" type='submit' value='Submit' />
                        <input class="button" type='reset' value='Reset' />                                
                    </div>
                </fieldset>
            </form>

        
            </div>
        </div>
       
        <div class="gridbox gridfooter">
            <div class="footer">
            <!-- footer -->
			<?php include("Include/footer.html");?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
