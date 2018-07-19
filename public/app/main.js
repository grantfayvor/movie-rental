app.controller("MainController", ['$rootScope', '$scope', 'MainService',
    function ($rootScope, $scope, MainService) {

        $scope.movies = [];
        $scope.hotMovies = [];
        $scope.show = false;
        $scope.page = 'movies';
        $scope.cartCount = 0;
        $scope.rate = {};

        $scope.initialize = function () {
            $scope.getHotMovies();
            $scope.getCartCount();
            $scope.getAllByCategory(1);
            $scope.getRecommendedMovies();
            $scope.getTheatreLocations();
        };

        $scope.getHotMovies = function () {
            MainService.getHotMovies(function (response) {
                $scope.hotMovies = response.data;
                $scope.hotMovies.data = shuffle($scope.hotMovies.data);
                $scope.hotMovies.data = $scope.hotMovies.data.splice(0, 2);
            }, function () {
                console.log("error in getting hot movies");
            });
        };

        $scope.getRecommendedMovies = function () {
            MainService.getRecommendedMovies(function (response) {
                $scope.recommendedMovies = response.data;
                $scope.recommendedMovies.data = shuffle($scope.recommendedMovies.data);
                $scope.recommendedMovies.data = $scope.recommendedMovies.data.splice(0, 4);
            }, function (response) {
                console.log("error in getting recommended movies");
            });
        };

        $scope.getAllMovies = function () {
            MainService.getAllMovies(function (response) {
                $scope.movies = response.data;
            }, function (response, status) {
                console.log("an error occurred while fetching the list of movies");
            });
        };

        $scope.getAllByCategory = function (categoryId) {
            Pace.restart();
            MainService.findAllByCategory(categoryId, function (response) {
                $scope.movies = response.data;
            }, function (response) {
                console.log("error in fetching learning aids");
            });
        };

        $scope.getCartCount = function () {
            MainService.getCartCount(function (response) {
                $scope.cartCount = response.data;
                if ($scope.cartCount <= 0) {
                    MainService.restoreCart(function (resp) {
                        console.log("the cart was successfully restored");
                    }, function (resp) {
                        console.error("an error occurred while restoring the cart");
                    });
                }
            }, function (response) {
                console.log("error occured while getting count of the cart");
            });
        };

        $scope.addToCart = function (movie) {
            Pace.restart();
            var selectedMovie = {};
            selectedMovie.details = {
                "id": movie.id,
                "name": movie.name,
                "qty": 1,
                "price": parseInt(movie.selling_price)
            };
            selectedMovie.details.options = {
                "image_location": movie.image_location,
                "subtotal": selectedMovie.details.price * selectedMovie.details.qty
            };
            MainService.addToCart(selectedMovie, function (response) {
                $scope.getCartCount();
                $('#cartModal').modal('show');
                console.log("movie has been added to cart");
            }, function (response, status) {
                console.log("error in adding the movie to cart");
            });
        };

        $scope.searchByParam = function () {

            MainService.search($scope.searchParam, function (response) {
                if (!response.data.message) {
                    $scope.movies = response.data;
                } else {
                    $scope.moviesMessage = response.data.message;
                }
            });
        };

        $scope.movieInfo = function (movie) {
            Pace.restart();
            $scope.currentMovie = movie;
            $scope.currentMovieRating = calculateRating($scope.currentMovie.ratings);
            //console.log('=========');
            //console.log($scope.currentMovie);
            $scope.page = 'movie-details';
            $('#ratingModal').modal('show');
        };

        $scope.simpleArray = function (arrayLength) {
            return new Array(arrayLength);
        };

        var calculateRating = function (ratings) {
            var total = 0;
            for (var i = 0; i < ratings.length; i++) {
                total += ratings[i].rating;
            }
            return Math.floor(total / ratings.length);
        };

        $scope.rateMovie = function (rating) {
            $scope.rate.rating = rating;
            var userRating = document.getElementById('userRating');
            var userRatingList = userRating.children;
            for (var i = 0; i < userRatingList.length; i++) {
                if (i < rating) {
                    userRatingList[i].children[0].children[0].classList.add('fa-star-colored');
                } else {
                    userRatingList[i].children[0].children[0].classList.remove('fa-star-colored');
                }
            }
        };

        $scope.submitRating = function () {
            Pace.restart();
            $scope.rate.movieId = $scope.currentMovie.id;
            MainService.submitRating($scope.rate, function (resp) {
                console.log("success in rating");
            }, function (resp) {
                console.error("error occurred while rating");
            });
        };

        $scope.addItemClass = function (index) {
            if (index == 2) {
                //$('#hot').addClass('active');
                setTimeout(function () {
                    document.getElementById('hot').classList.add('active');
                    $scope.show = true;
                }, 100);
            }
            return index;
        };

        $scope.nextPage = function (url) {
            Pace.restart();
            MainService.nextPage(url, function (response) {
                $scope.movies = response.data;
            }, function (response) {
                console.log("error occured while getting next page");
            });
        };

        $scope.previousPage = function (url) {
            Pace.restart();
            MainService.previousPage(url, function (response) {
                $scope.movies = response.data;
            }, function (response) {
                console.log("error occured while getting previous page");
            });
        };

        $scope.submitReview = function () {
            Pace.restart();
            $scope.review.movieId = $scope.currentMovie.id;
            MainService.submitReview($scope.review, function (resp) {
                console.log(resp.data);
                var index = $scope.movies.data.findIndex(function (movie) {
                    return movie.id == $scope.review.movieId;
                });
                $scope.movies.data[index].reviews.push(resp.data);
                $scope.review = {};
            }, function (resp) {
                console.log(resp);
            });
        };

        $scope.getTheatreLocations = function () {
            MainService.getTheatreLocations(function (response) {
                $scope.theatreLocations = response.data;
            }, function(response) {
                console.error("error occurred while fetching the theatre locations");
            });
        };

        $scope.getMoviesByTheatreLocation = function (location) {
            Pace.restart();
            MainService.getByTheatreLocation(location, function(resp) {
                $scope.movies = resp.data;
            }, function(resp) {
                console.error(resp);
            });
        };

        var shuffle = function (array) {
            var currentIndex = array.length, temporaryValue, randomIndex;

            // While there remain elements to shuffle...
            while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;
        };

        window.onbeforeunload = function (event) {
            MainService.storeCart(function (resp) {
                console.log("cart was saved");
            }, function (resp) {
                console.error("error occurred while saving the cart");
            });
            return "About to save your cart";
        };

    }]);

app.service("MainService", ['APIService', function (APIService) {

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/movie/search/" + param, successHandler, errorHandler);
    };

    this.getByTheatreLocation = function(location, successHandler, errorHandler) {
        APIService.get('/api/movies/location/' + location, successHandler, errorHandler);
    };

    this.getHotMovies = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/movies/status/" + status + "", successHandler, errorHandler);
    };

    this.getRecommendedMovies = function (successHandler, errorHandler) {
        var status = "COLD";
        APIService.get("/api/movies/status/" + status + "", successHandler, errorHandler);
    };

    this.getAllMovies = function (successHandler, errorHandler) {
        APIService.get("/api/movies", successHandler, errorHandler);
    };

    this.saveMovie = function (movieDetails, successHandler, errorHandler) {
        APIService.post("/api/movie/save", movieDetails, successHandler, errorHandler);
    };

    this.findAllByCategory = function (categoryId, successHandler, errorHandler) {
        APIService.get('/api/movies/find?q=' + categoryId, successHandler, errorHandler);
    };

    this.addToCart = function (selectedMovie, successHandler, errorHandler) {
        APIService.post("/api/cart/add", selectedMovie, successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.storeCart = function (successHandler, errorHandler) {
        APIService.post('/api/cart/save', {}, successHandler, errorHandler);
    };

    this.restoreCart = function (successHandler, errorHandler) {
        APIService.get('/api/cart/restore', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.submitReview = function (details, successHandler, errorHandler) {
        APIService.post('/review', details, successHandler, errorHandler);
    };

    this.submitRating = function (details, successHandler, errorHandler) {
        APIService.post('/rating', details, successHandler, errorHandler);
    };

    this.getTheatreLocations = function(successHandler, errorHandler) {
        APIService.get('/theatre/distinct', successHandler, errorHandler);
    };

}]);