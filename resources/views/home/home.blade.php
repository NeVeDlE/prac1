@extends('layouts.master')
@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/jquery.flipster.min.css">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">


				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <section class="service_section commonSection" id="second">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h4 class="red_color wow slideInDown" data-wow-duration="2s">SERVICES</h4>
                                    <h2 class="sec_title wow bounceInLeft" data-wow-duration="2.2s">We are E-Sports that<br> Compete and aim for win</h2>
                                    <p class="color_aaa wow slideInUp">
                                       We are giving our best to win only to win nothing else<br> And we offer best T-Shirts
                                    </p>
                                </div>
                            </div>
                            <div class="row custom_column wow slideInRight" data-wow-duration="2.5s">
                                <div class="col-lg-3 col-sm-12 col-md-3">
                                    <a href="{{url('/home')}}" class="box text-center">
                                        <div class="flipper">
                                            <div class="front">
                                                <i class="typcn typcn-shopping-cart"></i>
                                                <h3>Home</h3>
                                            </div>
                                            <div class="back">
                                                <i class="typcn typcn-shopping-cart"></i>
                                                <h3>Check it Out</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-3">
                                    <a href="{{url('/store')}}" class="box text-center">
                                        <div class="flipper">
                                            <div class="front">
                                                <i class="far fa-file-alt"></i>
                                                <h3>Store</h3>
                                            </div>
                                            <div class="back">
                                                <i class="far fa-file-alt"></i>
                                                <h3>Learn more about us</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-3">
                                    <a href="{{url('/market')}}" class="box text-center">
                                        <div class="flipper">
                                            <div class="front">
                                                <i class="mdi mdi-account-card-details"></i>
                                                <h3>Market</h3>
                                            </div>
                                            <div class="back">
                                                <i class="mdi mdi-account-card-details"></i>
                                                <h3>learn about our players</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-3">
                                    <a href="{{url('/orders')}}" class="box text-center">
                                        <div class="flipper">
                                            <div class="front">
                                                <i class="mdi mdi-account-network"></i>
                                                <h3>Orders</h3>
                                            </div>
                                            <div class="back">
                                                <i class="mdi mdi-account-network"></i>
                                                <h3>Know about our managers names and stuff</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </section>
                    <br><br><br><br><br>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.flipster.min.js"></script>
    <script src="js/flipster-custom.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/custom.js"></script>
    <script>

        $(window).scroll(function() {
            var scrl = $(window).scrollTop();
            if (scrl < 60)
            {
                $('.header_01').removeClass('fixedbar');
            }
            else
            {
                $('.header_01').addClass('fixedbar');
            }
        });
    </script>
    <script>

        (function($) {
            "use strict";

            $('.anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });





        })(jQuery);

        /*Scroll to top when arrow up clicked BEGIN*/
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 100) {
                $('#back2Top').fadeIn();
            } else {
                $('#back2Top').fadeOut();
            }
        });
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

    </script>
    <script>
        new WOW().init();
    </script>

    <script>
        $(function () {

            $("a.smooth-scroll").click(function (event) {

                event.preventDefault();

                // get/return id like #about, #work, #team and etc
                var section = $(this).attr("href");

                $('html, body').animate({
                    scrollTop: $(section).offset().top - 64
                }, 1250, "easeInOutExpo");
            });
        });

    </script>
@endsection
