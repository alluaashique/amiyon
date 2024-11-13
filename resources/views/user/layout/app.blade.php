<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap"rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/style-liberty.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- jQuery (only include once) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<style>
    #toast-container {
        z-index: 99999999;
    }
</style>
@php
use Illuminate\Support\Str;
@endphp
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1><a class="navbar-brand mr-lg-5" href="index.html">
                        <img src="{{ asset('user_assets/images/logo.png') }}" alt="Your logo"
                            title="Your logo" />Blogs
                    </a></h1>
                <!-- if logo is image enable this
        <a class="navbar-brand" href="#index.html">
            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
        </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item @if(Route::currentRouteName() == 'index') active @endif " >
                            <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span> </a>
                        </li>



                        <li class="nav-item @if (Str::startsWith(Route::currentRouteName(), 'blog')) active @endif">
                            <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
                        </li>

                        @auth
                        <li class="nav-item @if (Str::startsWith(Route::currentRouteName(), 'logout')) active @endif">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a>   
                            </form>
                        </li> 
                        @else
                        
                        <li class="nav-item @if (Str::startsWith(Route::currentRouteName(), 'login')) active @endif">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                       
                        
                        
                        @endauth


                       
                     
                        <li class="ml-lg-auto mr-lg-0 m-auto">
                            <!--/search-right-->
                            <div class="search-right">
                                <a href="#search" title="search"><span class="fa fa-search"
                                        aria-hidden="true"></span></a>
                                <!-- search popup -->
                                <div id="search" class="pop-overlay">
                                    <div class="popup">
                                        <h4 class="mb-3">Search here</h4>
                                        <form action="{{route('blog.index')}}" method="GET" class="search-box">
                                            <input type="search" placeholder="Enter Keyword" name="search"
                                                required="required" autofocus="">
                                            <button type="submit" class="btn btn-style btn-primary">Search</button>
                                        </form>

                                    </div>
                                    <a class="close" href="#close">×</a>
                                </div>
                                <!-- /search popup -->
                            </div>
                            <!--//search-right-->
                        </li>
                       
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->


    @yield('content')

   
    <!-- footer 14 -->
    <div class="w3l-footer-main">
        <div class="w3l-sub-footer-content">
            <section class="_form-3">
                <div class="form-main">
                    <div class="container">
                        <div class="middle-section grid-column top-bottom">
                            <div class="image grid-three-column">
                                <img src="{{ asset('user_assets/images/subscribe.png') }}" alt=""
                                    class="img-fluid radius-image-full">
                            </div>
                            <div class="text-grid grid-three-column">
                                <h2>Subscribe our Newsletter to receive latest updates from us</h2>
                                <p>We won’t give you spam mails.</p>
                            </div>
                            <div class="form-text grid-three-column">
                                <form action="/" method="GET">
                                    <input type="email" name=" placeholder" placeholder="Enter Your Email"
                                        required="">
                                    <button type="submit" class="btn btn-style btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footers-14 -->
            <footer class="footer-14">
                <div id="footers14-block">
                    <div class="container">
                        <div class="footers20-content">
                            <div class="d-grid grid-col-4 grids-content">
                                <div class="column">
                                    <h4>Our Address</h4>
                                    Kollam
                                   
                                </div>
                                <div class="column">
                                    <h4>Call Us</h4>
                                    <!-- <p>Mon - Fri 10:30 -18:00</p> -->
                                    
                                    <p><a href="tel:99999999">99999999</a></p>
                                  
                                   
                                </div>
                                <div class="column">
                                    <h4>Mail Us</h4>
                                   
                                </div>
                                <div class="column">
                                    <h4>Follow Us On</h4>
                                    <ul>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footers14-bottom d-flex">
                            <div class="copyright">
                                <p> © <span id="currentYear">2020</span>. All rights reserved</p>
                            </div>
                            <div class="language-select d-flex">
                                <span class="fa fa-language" aria-hidden="true"></span>
                                <select>
                                    <option>English</option>
                                    <option>Estonina</option>
                                    <option>Deutsch</option>
                                    <option>Nederlan;ds</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- move top -->
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    &uarr;
                </button>
                <script>

                    const currentYear = new Date().getFullYear();
                    document.getElementById("currentYear").innerText = currentYear;

                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function() {
                        scrollFunction()
                    };

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            document.getElementById("movetop").style.display = "block";
                        } else {
                            document.getElementById("movetop").style.display = "none";
                        }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>
                <!-- /move top -->

            </footer>
            <!-- Footers-14 -->
        </div>
    </div>
    <!-- //footer 14 -->

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {{-- {!! Toastr::message() !!} --}}

    <script src="{{ asset('user_assets/js/jquery-3.3.1.min.js') }}"></script> <!-- Common jquery plugin -->

    <script src="{{ asset('user_assets/js/theme-change.js') }}"></script><!-- theme switch js (light and dark)-->
    <script src="{{ asset('user_assets/js/owl.carousel.js') }}"></script>

    <!-- script for banner slider-->
    <script>
        $(document).ready(function() {
            $('.owl-one').owlCarousel({
                loop: true,
                dots: false,
                margin: 0,
                nav: true,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    667: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })
    </script>
    <!-- //script -->

    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function() {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    736: {
                        items: 1
                    },
                    1000: {
                        items: 2,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <script src="{{ asset('user_assets/js/counter.js') }}"></script>

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="{{ asset('user_assets/js/bootstrap.min.js') }}"></script>
    <!-- //bootstrap-->
</body>

</html>
