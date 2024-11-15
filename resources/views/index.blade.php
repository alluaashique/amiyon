@extends('user.layout.app')
@section('content')
    <!-- main-slider -->
    <section class="w3l-main-slider" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                <div class="item">
                    <li>
                        <div class="slider-info banner-view bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-left">
                                        <p>Charity Life</p>
                                        <h5>Charity, Faith and Hope. Help the Homeless. Charity life.</h5>
                                        <a href="about.html" class="btn btn-primary btn-style">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info  banner-view banner-top1 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-left">
                                        <p>Save Children</p>
                                        <h5>Donate with Kindness. Every amount Donated by you Counts.</h5>
                                        <a href="about.html" class="btn btn-primary btn-style">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info banner-view banner-top2 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-left">
                                        <p>Unconditional Help</p>
                                        <h5>Give a Helping hand. We all need to come together. Our Mission.</h5>
                                        <a href="about.html" class="btn btn-primary btn-style">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info banner-view banner-top3 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-left">
                                        <p>Unconditional Help</p>
                                        <h5>Should Children suffer this way? Don't leave Orphans alone</h5>
                                        <a href="about.html" class="btn btn-primary btn-style">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </section>
    <!-- /main-slider -->
    <!-- banner image bottom shape -->
    <div class="position-relative">
        <div class="shape overflow-hidden">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor">
                </path>
            </svg>
        </div>
    </div>
    <!-- //banner image bottom shape -->
    <!-- home page block1 -->
    <section class="homeblock1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="box-wrap">
                        <h4><a href="#mission">View our Mission</a></h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-sm-4 mt-3">
                    <div class="box-wrap">
                        <h4><a href="#team">Top Founders</a></h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-4 mt-3">
                    <div class="box-wrap">
                        <h4><a href="contact.html">Request a Quote</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //home page block1 -->
    <!-- middle -->
    <div class="middle py-5" id="facts">
        <div class="container pt-lg-3">
            <div class="welcome-left text-center py-md-5 py-3">
                <h3 class="title-big">100% of all Donations go directly to Projects.</h3>
                <!-- <p class="my-3">Under 7% for admin, fundraising, and salaries.</p> -->
                <h4>Thank you for your continued Support </h4>
                <a href="donate.html" class="btn btn-style btn-primary mt-sm-5 mt-4"><span class="fa fa-heart mr-1"></span>
                    Donate Now</a>
            </div>
        </div>
    </div>
    <!-- //middle -->

    <!-- /bottom-grids-->
    <section class="w3l-bottom-grids-6 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="grids-area-hny main-cont-wthree-fea row">
                <div class="col-lg-4 col-md-6 grids-feature">
                    <div class="area-box">
                        <img src="{{ asset('user_assets/images/donate.png') }}" alt="">
                        <h4><a href="#feature" class="title-head">Give Donation.</a></h4>
                        <p class="mb-3"> Your donation can transform lives. Join us in making a difference—each
                            contribution helps provide essential resources and support to those in need. Together, we
                            can create a brighter future.</p>
                        <a href="donate.html" class="btn btn-text">Donate Now </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-5">
                    <div class="area-box">
                        <img src="{{ asset('user_assets/images/volunteer.png') }}" alt="">
                        <h4><a href="#feature" class="title-head">Become a Volunteer.</a></h4>
                        <p class="mb-3"> Make a meaningful impact in your community. By volunteering, you’re giving
                            your time, skills, and heart to help those in need. Together, we can create positive
                            change—one action at a time.</p>
                        <a href="contact.html" class="btn btn-text">Join Now </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-5">
                    <div class="area-box">
                        <!-- <img src="{{ asset('user_assets/images/child.png') }}" alt="" width="52px">  -->
                        <img src="{{ asset('user_assets/images/child.png') }}" alt="">

                        <h4><a href="#feature" class="title-head">Help the Children.</a></h4>
                        <p class="mb-3"> Every child deserves a chance to thrive. Your support can provide essential
                            care, education, and hope for a better tomorrow. Together, we can change lives—starting with
                            theirs.</p>
                        <a href="donate.html" class="btn btn-text">Help Now </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //bottom-grids-->
    <!-- stats -->
    <section class="w3_stats py-5" id="stats">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center">
                <h3 class="title-big">Our mission is to help children by distributing Money and Service globally.</h3>
            </div>
            <div class="w3-stats text-center">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <span class="fa fa-users"></span>
                            <div class="timer count-title count-number mt-3" data-to="1500" data-speed="1500"></div>
                            <p class="count-text ">Total Volunteers</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <span class="fa fa-cutlery"></span>
                            <div class="timer count-title count-number mt-3" data-to="2256" data-speed="1500"></div>
                            <p class="count-text ">Meals Served</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <span class="fa fa-home"></span>
                            <div class="timer count-title count-number mt-3" data-to="1000" data-speed="1500"></div>
                            <p class="count-text ">Got Shelter</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <span class="fa fa-male"></span>
                            <div class="timer count-title count-number mt-3" data-to="260" data-speed="1500"></div>
                            <p class="count-text ">Adapted Children</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->
    <!-- bg -->
    <div class="w3l-bg py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="welcome-left text-center py-lg-4">
                <span class="fa fa-heart-o"></span>
                <h3 class="title-big">Help the Homeless & Hungry People.</h3>
                <a href="donate.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Donate Now</a>
            </div>
        </div>
    </div>
    <!-- //bg -->
    <section class="w3l-index5 py-5" id="causes">
        <div class="container py-lg-5 py-md-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="header-section">
                        <h3 class="title-big">Our Charity Causes </h3>
                        <h4>Want to be part of the journey with us? <a href="#url">Send your Details.</a></h4>
                        <p class="mt-3 mb-lg-5 mb-4"> Join us in our mission to uplift lives and provide hope. From
                            feeding families to supporting education, our causes focus on creating lasting change for
                            those in need.</p>
                    </div>
                    <a href="contact.html" class="btn btn-outline-primary btn-style">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                    <div class="img-block">
                        <a href="causes.html">
                            <img src="{{ asset('user_assets/images/blog5.jpg') }}" class="img-fluid radius-image-full"
                                alt="image" />
                            <span class="title">Food for Hungry</span>
                        </a>
                    </div>
                    <div class="img-block mt-4">
                        <a href="causes.html"> <img src="{{ asset('user_assets/images/blog2.jpg') }}"
                                class="img-fluid radius-image-full" alt="image" />
                            <span class="title">Help from Injuries</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4">
                    <div class="img-block">
                        <a href="causes.html"> <img src="{{ asset('user_assets/images/blog3.jpg') }}"
                                class="img-fluid radius-image-full" alt="image" />
                            <span class="title">Education for all</span>
                        </a>
                    </div>
                    <div class="img-block mt-4">
                        <a href="causes.html">
                            <img src="{{ asset('user_assets/images/blog4.jpg') }}" class="img-fluid radius-image-full"
                                alt="image" />
                            <span class="title">Clean water for all</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w3-services-ab py-5" id="mission">
        <div class="container py-lg-5 py-md-4">
            <h3 class="title-big text-center mb-5">Our Mission and Goals</h3>
            <div class="w3-services-grids">
                <div class="fea-gd-vv row">
                    <div class="col-lg-4 col-md-6">
                        <div class="float-lt feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/home.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Homeless Charities.</h5>
                                <p> Join us in providing shelter, food, and hope to those without a home. Your
                                    contribution can change lives and restore dignity to the less fortunate.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                        <div class="float-mid feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/education.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Education Charities.</h5>
                                <p> Support education charities to empower individuals through learning and resources.
                                    Your donations help create brighter futures and opportunities for all.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                        <div class="float-rt feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/health.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Health Charities.</h5>
                                <p> Support health charities to ensure everyone has access to vital medical care and
                                    resources. Your contributions can improve lives and foster healthier communities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-md-2">
                        <div class="float-lt feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/icon1.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Animal Charities.</h5>
                                <p> Join us in our mission to protect and care for animals in need. Your support
                                    provides shelter, food, and medical care for countless furry friends.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-md-2">
                        <div class="float-lt feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/food.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Food Charities.</h5>
                                <p> Help us fight hunger and provide meals to those in need. Your donations can nourish
                                    lives and bring hope to families struggling to put food on the table.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-md-2">
                        <div class="float-lt feature-gd">
                            <div class="icon">
                                <img src="{{ asset('user_assets/images/eco.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="icon-info">
                                <h5>Eco Charities.</h5>
                                <p> Join us in protecting our planet for future generations. Your contributions help
                                    fund conservation efforts, clean-up initiatives, and sustainable practices.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w3l-clients py-5" id="clients">
        <div class="call-w3 py-lg-5 py-md-4">
            <div class="container">
                <h3 class="title-big text-center">Whom we work with</h3>
                <div class="company-logos text-center mt-5">
                    <div class="row logos">
                        <div class="col-lg-2 col-md-3 col-4">
                            <img src="{{ asset('user_assets/images/brand1.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2 col-md-3 col-4">
                            <img src="{{ asset('user_assets/images/brand2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2 col-md-3 col-4">
                            <img src="{{ asset('user_assets/images/brand3.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2 col-md-3 col-4 mt-md-0 mt-4">
                            <img src="{{ asset('user_assets/images/brand4.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                            <img src="{{ asset('user_assets/images/brand5.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                            <img src="{{ asset('user_assets/images/brand6.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
