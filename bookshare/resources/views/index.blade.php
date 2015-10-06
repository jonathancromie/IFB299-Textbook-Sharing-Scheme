@extends('layouts.master')

@section('title', 'Home')

@section('content')
	@parent

	{{Session::get('message')}}

	<!-- Banner For Homepage-->
    <section id="banner">
        <div class="inner">
            <h2>This is ShareBook</h2>
		    <p>A free way to share textbooks for students at <a href="http://www.qut.edu.au">QUT</a></p>
		    <ul class="actions">
		        <li><a href="#content" class="button big special">Sign Up</a></li>
		        <li><a href="#elements" class="button big alt">Learn More</a></li>
		    </ul>
        </div>
    </section>

    <!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Ipsum feugiat consequat</h2>
					<p>Tempus adipiscing commodo ut aliquam blandit</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="fa fa-search fa-2x"></i>
								<a href="search"><h3>Find a Textbook</h3></a>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="fa fa-share-alt fa-2x"></i>
								<a href="share"><h3>Share a Textbook</h3></a>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="fa fa-download fa-2x"></i>
								<a href="borrow"><h3>Borrow a Textbook</h3></a>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
					</div>
				</div>
			</section>	
@endsection