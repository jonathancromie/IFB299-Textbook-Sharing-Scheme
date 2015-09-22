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
			<h1> Share your books with the community </h1>
			<img src="http://s14.postimg.org/wn4ee65dp/logo.jpg" class="displayed" alt="logo" ;>
  <p> You can share your books and notes with Share-book community users following these steps:</p>
  <ul>
  <li> Register, only registered users can add books.</li>
  <li> From you profile, click add books.</li>
  <li> Upload the book and fill the form with appropriate description.</li>
</ul>  
                
            </div>
        </div>
        <div class="gridbox gridright">
            <div class="right">
<h1> Find the books you need</h1>
<img src="http://www.flipping-book-maker.com/pdf-to-flipping-book/images/search_pdf_to_flipping_book.jpg" class="displayed" alt="logo" ;>
   <p> You can search the books by varios ways:</p>
  <ul>
  <li> Access the main page, no registration required </li>
  <li> From the search box, type the book faculty, ISBN, writer or title.</li>
  <li> The website allow you to sort the search results according to the above categories as well.</li>
</ul>  
            </div>
        </div>
        <!-- repeat pattren if required-->

        
        
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
