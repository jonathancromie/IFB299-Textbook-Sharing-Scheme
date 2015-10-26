@extends('layouts.master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/profile-tabs.js') }}"></script>
<!-- <script src="{{ asset('js/profile-rating.js') }}"></script> -->
<script src="js/jquery-profile.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('css/profilestyle.css') }}" type="text/css" />

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
    }(document, new Date(), "script", "rating-widget.com/"));
</script>

 <!--<script src="{{ asset('js/jquery-profile.min.js') }}"></script> -->

@section('title', 'Profile')

@section('content')
    @parent
    <h2>Profile</h2> 

    <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="default avatar">  <!-- src="img/avatar.png -->  
    
    <div id="w">
      <div id="content" class="clearfix">
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
          <p class="setting"><span>Given Name </span> {{ Auth::user()->first_name }} </p>          
          <p class="setting"><span>Surname </span> {{ Auth::user()->last_name }} </p>          
          <p class="setting"><span>Sex </span> {{ Auth::user()->sex }} </p>          
          <p class="setting"><span>Date of Birth </span> {{ Auth::user()->dob }} </p>          
          <!-- <p class="setting"><span>Edit <img src="img/edit.png" alt="*Edit*"></span> <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a> </p> -->
    			</br>              
        </section>      
        <!-- Tab 2 : Contact Information -->        
        <section id="activity" class="hidden">
          <!-- <table border="1" style="width:100%">
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
          </table> -->
          <p class="setting"><span>Email Address </span> {{ Auth::user()->email }} </p>          
          <p class="setting"><span>Phone </span> {{ Auth::user()->phone }} </p>          
          <p class="setting"><span>Street </span> {{ Auth::user()->street }} </p>          
          <p class="setting"><span>Suburb </span> {{ Auth::user()->suburb }} </p> 
          <p class="setting"><span>Post Code </span> {{ Auth::user()->post_code }} </p>          
          <p class="setting"><span>State </span> {{ Auth::user()->state }} </p>           
          <!-- <p class="setting"><span>Edit <img src="img/edit.png" alt="*Edit*"></span> <a class="btn btn-small btn-success" href="{{ URL::to('user/profile') }}">Edit</a> </p> -->
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
        </section>
      </div><!-- @end #content -->
    </div><!-- @end #w -->
@endsection
