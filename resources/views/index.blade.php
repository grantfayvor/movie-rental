<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <title>Movie-Booking</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/pace.css" rel="stylesheet">
    <script src="/js/pace.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body data-ng-controller="MainController">
<header id="header" data-ng-init="initialize()">
    <!--header-->

    <!-- Collapsed Hamburger -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="header-middle" style="background-color: white;">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    {{--<div class="logo pull-left">--}}
                        <!-- TODO change logo to company logo-->
                        {{--<a href="/">--}}
                            <!-- <img src="images/logo.png" style="height:60px; width:80px;" alt="Movie-Booking" /> -->
                        {{--</a>--}}
                    {{--</div>--}}
                    <div class="search_box pull-left">
                        <input type="text" placeholder="Search" data-ng-model="searchParam"
                               data-ng-change="searchByParam()"/>
                    </div>
                    <div class="btn-group pull-right">
                        {{--<div class="search_box pull-left">
                            <input type="text" placeholder="Search" data-ng-model="searchParam"
                                   data-ng-change="searchByParam()"/>
                        </div>--}}
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Select theatre location
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-ng-click="getMoviesByTheatreLocation(theatre.location)" data-ng-repeat="theatre in theatreLocations"><% theatre.location %></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="mainmenu pull-right">
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <ul class="nav navbar-nav">
                                @if(!$username)
                                    <li class="dropdown">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul role="menu" class="sub-menu">
                                            <li>
                                                <a href="/login" style="background-color: inherit!important;">
                                                    <i class="fa fa-sign-in"></i> Sign in</a>
                                            </li>
                                            <li>
                                                <a href="/register" style="background-color: inherit!important;">
                                                    <i class="fa fa-user"></i> Create Account</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="dropdown">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-user"></i> {{ $username }}
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul role="menu" class="sub-menu">
                                            @if($admin)
                                                <li>
                                                    <a href="/admin/dashboard"
                                                       style="background-color: inherit!important;">
                                                        <i class="fa fa-dashboard"></i> Admin Dashboard</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="/profile" style="background-color: inherit!important;">
                                                    <i class="fa fa-eye"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="/logout" style="background-color: inherit!important;">
                                                    <i class="fa fa-power-off"></i> Sign Out</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li>
                                    <a href="/checkout">
                                        <i class="fa fa-crosshairs"></i> Checkout</a>
                                </li>
                                <li>
                                    <a href="/cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Cart</span>
                                        <i data-ng-if="cartCount" style="display: block;height: 18px;width: 18px;line-height: 18px;-moz-border-radius: 50%;
                                                    border-radius: 50%;background-color: black;color: white;text-align: center;font-size: 1em;float:right;"
                                           data-ng-bind="cartCount"></i>
                                    </a>
                                </li>
                                @if($username)
                                    <li>
                                        <a href="/logout">
                                            <i class="fa fa-power-off"></i> Sign out</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->


</header>
<!--/header-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right" data-ng-show="page != 'movie-details'">
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            @foreach($categories as $category) @if($category == $categories[0])
                                <li class="active">
                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})"
                                       data-toggle="tab">{{ $category->name}}</a>
                                </li>
                            @else
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})"
                                       data-toggle="tab">{{ $category->name}}</a>
                                </li>
                            @endif @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt">
                            <div class="col-sm-3" data-ng-repeat="movie in movies.data">
                                <div class="movie-image-wrapper">
                                    <div class="single-movies">
                                        <div class="movieinfo text-center">
                                            <a href="javascript:void(0)" data-ng-click="movieInfo(movie)">
                                                <img data-ng-src="<%movie.image_location%>" alt="movie image"
                                                     style="height:200px;"/>

                                                <h2>₦
                                                    <span data-ng-bind="movie.selling_price"></span>
                                                </h2>

                                                <p data-ng-bind="movie.name"></p>
                                            </a>
                                            <a href="javascript:void(0)" data-ng-click="addToCart(movie)"
                                               class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Book Movie</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" data-ng-show="movies.next_page_url || movies.prev_page_url">
                    <ul class="pagination" style="background-color:white!important;">
                        <li>
                            <a href="javascript:void(0)" data-ng-click="previousPage(movies.prev_page_url)">Previous</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-ng-click="nextPage(movies.next_page_url)">Next</a>
                        </li>
                    </ul>
                </div>
                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div id="<% $index %>" class="item" data-ng-repeat="movie in recommendedMovies.data"
                                 data-ng-class="{'active': $index < 4}">
                                <div class="col-sm-3">
                                    <div class="movie-image-wrapper">
                                        <div class="single-movies">
                                            <div class="movieinfo text-center">
                                                <a href="javascript:void(0)" data-ng-click="movieInfo(movie)">
                                                    <img data-ng-src="<%movie.image_location%>" alt="movie image"
                                                         style="height:200px;"/>

                                                    <h2>₦
                                                        <span data-ng-bind="movie.selling_price"></span>
                                                    </h2>

                                                    <p data-ng-bind="movie.name"></p>
                                                </a>
                                                <a href="javascript:void(0)" data-ng-click="addToCart(movie)"
                                                   class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Book Movie</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/recommended_items-->

            </div>
            <div class="col-sm-12 padding-right" data-ng-show="page == 'movie-details'">

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="javascript:void(0)" data-ng-click="page = 'movies'">Home</a>
                        </li>
                        <li class="active" data-ng-bind="currentMovie.name"></li>
                    </ol>
                </div>
                <div class="clearfix"></div>
                <div class="category-tab">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="movie-details">
                            <div class="col-sm-12">
                                <div class="movie-image-wrapper">
                                    <div class="single-movies">
                                        <div class="movieinfo text-center">
                                            <div class="col-sm-6 col-md-6">
                                                <img data-ng-src="<%currentMovie.image_location%>" alt="movie image"
                                                     style="height:500px;"/>
                                                <hr/>
                                                <section class="score-panel">
                                                    <ul class="stars text-center">
                                                        <li data-ng-repeat="i in simpleArray(5) track by $index">
                                                            <i class="fa fa-star" data-ng-class="{'fa-star-colored': $index < currentMovieRating}"></i>
                                                        </li>
                                                    </ul>
                                                </section>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="col-sm-6 col-xs-6">

                                                        <h2>₦
                                                            <span data-ng-bind="currentMovie.selling_price"></span>
                                                        </h2>

                                                        <h3 data-ng-bind="currentMovie.name"></h3>
                                                        <p class="badge badge-info text-small" data-ng-bind="currentMovie.brand"></p>

                                                        <p class="text-left" data-ng-bind="currentMovie.details"></p>
                                                        <a href="javascript:void(0)"
                                                           data-ng-click="addToCart(currentMovie)"
                                                           class="btn btn-default add-to-cart">
                                                            <i class="fa fa-shopping-cart"></i>Book Movie</a>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div data-ng-repeat="review in currentMovie.reviews">
                                                            <p>
                                                                <span data-ng-bind="review.message"></span>
                                                                <span data-ng-bind="review.created_at"></span>
                                                            </p>
                                                        </div>
                                                        <div data-ng-if="!currentMovie.reviews.length">
                                                            <p>
                                                                <span>No reviews yet.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <form class="form-horizontal" data-ng-submit="submitReview()">
                                                        <div class="form-group">
                                                            <label class="control-label pull-left"
                                                                   for="review">Review</label>
                                                            <textarea id="review" name="review" data-ng-model="review.message"
                                                                      class="form-control" required=""></textarea>

                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-info btn-sm pull-right">Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <ul>
                        <li data-ng-repeat="theatre in currentMovie.theatres"><p class="badge badge-info">
                                <span data-ng-bind="theatre.name"></span>, <span data-ng-bind="theatre.location"></span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>
                            <span>Movie-Booking</span>
                        </h2>

                        <p>The number one stop shop for your educational materials</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3" data-ng-repeat="movie in hotMovies.data">
                        <div class="video-gallery text-center">
                            <a href="javascript:void(0)" data-ng-click="movieInfo(movie)">
                                <div class="iframe-img">
                                    <img data-ng-src="<% movie.image_location %>" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <!-- <p>popular today</p>

                                <h2>
                                <?php /* echo Date('d M Y') */ ?>
                                </h2> -->
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="address text-center">
                        <img src="images/home/map.png" alt=""/>

                        <p>Enugu, Nigeria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Movie-Booking</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <!-- <li>
                                <a href="/company-info">Company Information</a>
                            </li> -->
                            <li>
                                <a href="#" data-toggle="modal" data-target="#storeLocationModal">Store Location</a>
                            </li>
                            <li>
                                <a href="/terms-of-use">Terms of Use</a>
                            </li>
                            <li>
                                <a href="/privacy-policy">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="/refund-policy">Refund Policy</a>
                            </li>
                            <li>
                                <a href="/contact-us">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="single-widget">
                        <!-- <h2>Contact Movie-Booking</h2> -->

                        <form action="/" method="get" class="searchform">
                            <input type="text" placeholder="Movie-Booking" disabled/>
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Get the most recent educational materials from
                                <br/>us at Movie-Booking...</p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="social-icons pull-left">
                        <!-- <ul class="nav navbar-nav">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--modal-->
    <div id="cartModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>The movie was successfully added to cart</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <div id="ratingModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Rate the Movie</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <section class="score-panel">
                            <ul id="userRating" class="stars text-center">
                                <li>
                                    <a href="javascript:;" data-ng-click="rateMovie(1)"> <i class="fa fa-star"></i> </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-ng-click="rateMovie(2)"> <i class="fa fa-star"></i> </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-ng-click="rateMovie(3)"> <i class="fa fa-star"></i> </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-ng-click="rateMovie(4)"> <i class="fa fa-star"></i> </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-ng-click="rateMovie(5)"> <i class="fa fa-star"></i> </a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default pull-left">Close</a>
                    <a href="javascript:;" data-ng-click="submitRating()" class="btn btn-primary pull-right add-to-cart">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <div id="storeLocationModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Movie-Booking</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Find us at Enugu, Nigeria.</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row" style="text-align: center;">
                <p class="pull-left">Copyright ©
                    <?php echo date("Y"); ?>
                    <a href="/">Movie-Booking.com</a> All rights reserved.</p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->

<style>
    .my-circle {
        display: block;
        height: 60px;
        width: 60px;
        line-height: 60px;

        -moz-border-radius: 30px;
        /* or 50% */
        border-radius: 30px;
        /* or 50% */
        background-color: black;
        color: white;
        text-align: center;
        font-size: 2em;
    }
</style>


<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/price-range.js"></script>
<script src="/js/jquery.prettyPhoto.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript" src="/app/angular.js"></script>
<script type="text/javascript" src="/app/config/config.js"></script>
<script type="text/javascript" src="/app/service/api-service.js"></script>
<script type="text/javascript" src="/app/main.js"></script>
</body>

</html>