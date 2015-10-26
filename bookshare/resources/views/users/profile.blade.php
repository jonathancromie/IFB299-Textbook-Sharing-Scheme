@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    @parent

    <head>
    	
  <title>User Profile </title>
  
  
         <link rel="stylesheet" href="{{ asset('css/profilestyle.css') }}" type="text/css" /> 
         <script src="{{ asset('js/jquery-profile.min.js') }}"></script> 
        


<script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "265016",
            uid: "54cf6b439223e4998e990d50a81b0b1d",
            source: "website",
            options: {
                "size": "medium",
                "style": "oxygen",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>


  
</head>
<body>


  <div id="w">
    <div id="content" class="clearfix">
    
      <div id="userphoto"><img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="default avatar"></div>  <!-- src="img/avatar.png -->
      <h1> User Profile </h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#bio" class="sel">Bio</a></li>
          <li><a href="#activity">Contact Information</a></li>
          <li><a href="#friends">Shared Books</a></li>
          <li><a href="#settings">Borrowed Books</a></li>
          <!-- <li><a href="#settings"> Feedback </a></li> -->
        </ul>
      </nav>
      
    <!-- Tab 1 : basic info + rating -->    
      <section id="bio">    
            <!-- Basic info-->
        <p class="setting"><span> Given Name </span> {{ Auth::user()->first_name }} </p>
        
        <p class="setting"><span> Surname </span> {{ Auth::user()->last_name }} </p>
        
        <p class="setting"><span>Sex </span> {{ Auth::user()->sex }} </p>
        
        <p class="setting"><span>Date of Birth </span> {{ Auth::user()->dob }} </p>
        
        <p class="setting"><span>Edit <img src="img/edit.png" alt="*Edit*"></span> <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a> </p>

  			</br>      
            <!-- Star Rating -->
  <div class="rw-ui-container"></div>

            <!-- feedback  -->
           <!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Form</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1445797376758");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
			<!-- end www.htmlcommentbox.com -->
            
      </section>
      
  <!-- Tab 2 : Contact Information -->        
      <section id="activity" class="hidden">
<table border="1" style="width:100%">
  <tr>
    <td>Email Address</td>
    <td>{{ Auth::user()->email }}</td>		
  </tr>

  <tr>
    <td>Phone Number</td>
    <td>{{ Auth::user()->phone }}</td>		
  </tr>

  <tr>
    <td>Street</td>
    <td>{{ Auth::user()->street }}</td>		
  </tr>

  <tr>
    <td>Suburb</td>
    <td>{{ Auth::user()->suburb }}</td>		
  </tr>
  <tr>
    <td>Post Code</td>
    <td>{{ Auth::user()->post_code }}</td>		
  </tr>
  <tr>
    <td>State</td>
    <td>{{ Auth::user()->state }}</td>		
  </tr>
</table>
        <p class="setting"><span>Edit <img src="img/edit.png" alt="*Edit*"></span> <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a> </p>

      </section>
      
  <!-- Tab 3: Shared Books -->    
      <section id="friends" class="hidden">

    <table>
        <thead> 
            <tr>
                <td>Book</td>
                <td>Due Date</td>
                <td>Pickup Location</td>
                <td>More Information</td>
            </tr>
        </thead>
        <tbody>
            @foreach($sharer as $key => $value)
                <tr>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->due_date }}</td>
                    <td>{{ $value->location }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">More Information</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      </section>


  <!-- Tab 4: Borrowed Books -->         
      <section id="settings" class="hidden">

<table>
        <thead> 
            <tr>
                <td>Book</td>
                <td>Due Date</td>
                <td>Pickup Location</td>
                <td>More Information</td>
            </tr>
        </thead>
        <tbody>
            @foreach($borrower as $key => $value)
                <tr>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->due_date }}</td>
                    <td>{{ $value->location }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $value->book_id) }}">More Information</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
      </section>
      

     
     
    </div><!-- @end #content -->
  </div><!-- @end #w -->
  
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>

@endsection
