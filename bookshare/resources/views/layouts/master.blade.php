<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        @yield('scripts')
        <!-- <base href="http://localhost/ifb299/bookshare/public/"> -->
        <base href="http://60.240.144.91/ifb299/bookshare/public/">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!-- [if lte IE 8]><script src="js/html5shiv.js"></script><![endif] -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/skel.min.js') }}"></script>
        <script src="{{ asset('js/skel-layers.min.js') }}"></script>
        <script src="{{ asset('js/init.js') }}"></script>
        
        <noscript>
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
            <link rel="stylesheet" href="{{ asset('css/skel.css') }}" type="text/css" />            
            <link rel="stylesheet" href="{{ asset('css/style-xlarge.css') }}" type="text/css" />
        </noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
        
    </head>
    <body>
        <!-- Header -->
        <header id="header" class="skel-layers-fixed">
            <a href="index"><img src="{{ URL::asset('images/logo.png') }}" alt="logo" width="140" height="45px" align="left"></a>
            <nav id="nav">
                <ul>
                    <li><a href="{{ asset('index') }}">Home</a></li>
                    
                    @unless(!Auth::check())
                        <li><a href="{{ asset('search') }}">Find</a></li>
                        <li><a href="{{ asset('share') }}">Share</a></li>
                        <li><a href="{{ asset('borrow') }}">Borrow</a></li>
                        <li><a href="{{ asset('profile') }}">Profile</a></li>
                    @endunless
                    <!-- <li><a href="{{ asset('login') }}">Login</a></li> -->
                    @if(Auth::check())
                        <li><a href="{{ asset('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ asset('login') }}">Login</a></li>
                    @endif
                    <!-- <li><a href="{{ asset('register') }}" class="button special">Sign Up</a></li> -->
                    @unless(Auth::check())
                        <li><a href="{{ asset('register') }}" class="button special">Sign Up</a></li>
                    @endunless
                </ul>
            </nav>
        </header>

        


        <!-- Content -->
        <section id="one" class="wrapper style1">
            <header class="major">
                @yield('content')
            </header>
        </section>
    </body>
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row double">
                <div class="6u">
                    <div class="row collapse-at-2">
                        <div class="6u">
                            <h3>About</h3>
                            <ul class="alt">
                                <li><a href="help">Help</a></li>
                                <li><a href="faq">FAQ</a></li>
                                <li><a href="terms">Terms and Conditions</a></li>
                            </ul>
                        </div>
                        <div class="6u">
                            <h3>Faucibus</h3>
                            <ul class="alt">
                                <li><a href="#">Nascetur nunc varius</a></li>
                                <li><a href="#">Vis faucibus sed tempor</a></li>
                                <li><a href="#">Massa amet lobortis vel</a></li>
                                <li><a href="#">Nascetur nunc varius</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="6u">
                    <h2>Aliquam Interdum</h2>
                    <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
                    <ul class="icons">
                        <li><a href="https://twitter.com/sharebookqut" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="https://www.facebook.com/ShareBook-1080072202017113" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <!-- <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li> -->
                        <!-- <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li> -->
                        <!-- <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li> -->
                    </ul>
                </div>
            </div>
            <ul class="copyright">
                <li>&copy; Scrumbags Limited. All rights reserved.</li>
                <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
            </ul>
        </div>
    </footer>
</html>
