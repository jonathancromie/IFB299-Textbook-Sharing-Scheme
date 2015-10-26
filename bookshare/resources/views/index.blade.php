@extends('layouts.master')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >

@section('title', 'Home')

@section('content')
	@parent

	{{Session::get('message')}}

	<!-- Banner For Homepage-->
    <section id="banner">
        <div class="inner">
            <h2>This is ShareBook</h2>
		    <p>Share your textbooks for free with other students at <a href="http://www.qut.edu.au">QUT</a></p>
		    <ul class="actions">
		        <li><a href="register" class="button big special">Sign Up</a></li>
		        <li><a href="about" class="button big alt">Learn More</a></li>
		    </ul>
        </div>
    </section>

    <!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Because knowledge is power</h2>
					<p>Choose an option</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<!-- <i class="fa fa-search fa-2x"></i> -->
								<i class="material-icons md-96">search</i>
								<a href="search"><h3>Find a Textbook</h3></a>
								<p>Search for a textbook in the database.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<!-- <i class="fa fa-share-alt fa-2x"></i> -->
								<i class="material-icons md-96">share</i>
								@if (Auth::check())
									<a href="share"><h3>Share a Textbook</h3></a>
								@else
									<a href="login"><h3>Share a Textbook</h3></a>
								@endif
								<p>Share a textbook with other students.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<!-- <i class="fa fa-download fa-2x"></i> -->
								<i class="material-icons md-96">get_app</i>
								@if (Auth::check())
									<a href="borrow"><h3>Borrow a Textbook</h3></a>
								@else
									<a href="login"><h3>Borrow a Textbook</h3></a>
								@endif
								<p>Borrow a textbook from another student.</p>
							</section>
						</div>
					</div>
				</div>
			</section>	
@endsection