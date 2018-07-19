var idToUpdate;

app.controller("MovieController", ['$scope', '$timeout', '$rootScope', 'MovieService', function ($scope, $timeout, $rootScope, MovieService) {

    $scope.movies = [];
    $scope.new_movie = {};
    $scope.theatres = [];
    $scope.page = 'movie-list';

    $scope.initialize = function () {
        $scope.getAllMovies();
        $scope.getCategories();
    };

    $scope.getAllMovies = function () {
        MovieService.getAllMovies(function (response) {
            $scope.movies = response.data;
        }, function (response, status) {
            console.log("an error occured while fetching the list of movies");
        });
    };

    $scope.addNewMovie = function () {
        Pace.restart();
        MovieService.saveMovie($scope.new_movie, function (response) {
            console.log("movie was added successfully");
        }, function (response, status) {
            console.log("error in adding movie");
        });
    };

    $scope.updateMovie = function () {
        Pace.restart();
        var payload = new FormData();
        payload.append('name', $scope.updatedMovie.name);
        payload.append('brand', $scope.updatedMovie.brand);
        payload.append('categoryId', $scope.updatedMovie.categoryId);
        payload.append('details', $scope.updatedMovie.details);
        payload.append('image', $scope.updatedMovie.image);
        payload.append('status', $scope.updatedMovie.status);
        payload.append('showingAt', $scope.updatedMovie.showingAt);
        payload.append('theatreIds', $('#theatreId').val());
        MovieService.updateMovie($scope.updatedMovie.id, payload, function (response) {
            console.log("the movie was successfully updated");
        }, function (response) {
            console.log("error in updating the movie " + response);
        });
    };

    $scope.countMovies = function () {
        Pace.restart();
        MovieService.countMovies(function (response) {
            $scope.movieCount = response.data;
        }, function (response) {
            console.log("error in counting movies");
        });
    };

    $scope.deleteMovie = function () {
        $('#deleteModal').modal('hide');
        Pace.restart();
        MovieService.deleteMovie($scope.movieIdToDelete, function (response) {
            console.log("movie delete was successful");
            $scope.getAllMovies();
        }, function (response) {
            console.log("movie delete was unsuccessful");
        });
    };

    $scope.getCategories = function () {
        MovieService.getCategories(function(response) {
            $scope.categories = response.data;
        }, function (response) {
            console.log("error occurred while trying to fetch the categories");
        });
    };

    $scope.searchByParam = function () {
        $scope.page = 'movie-list';
        MovieService.search($scope.searchParam, function (response) {
            if (!response.data.message) {
                $scope.movies = response.data;
            } else {
                $scope.moviesMessage = response.data.message;
                $scope.page = 'movie-error';
            }
        }, function(response) {
            console.log("couldn't get the movies sorry");
        });
    };

    $scope.getTheatres = function () {
        MovieService.getTheatres(function(response) {
            $scope.theatres = response.data;
            $timeout(function() {
                $('#theatreId').chosen({placeholder_text_multiple: 'Select the theatres where the movie is showing'});
            }, 10);
        }, function (resp) {
            console.error(resp);
        });
    };

    $scope.showEditPage = function (movie) {
        Pace.restart();
        $scope.updatedMovie = movie;
        $scope.updatedMovie.sellingPrice = movie.selling_price;
        $scope.updatedMovie.categoryId = parseInt(movie.category_id);
        $scope.updatedMovie.id = parseInt(movie.id);
        $scope.updatedMovie.showingAt = movie.showing_at;
        $scope.page = 'edit-movie';
    };

    $scope.showDeletePage = function (movieId) {
        $scope.movieIdToDelete = movieId;
        $('#deleteModal').modal('show');
    };

    $scope.nextPage = function (url) {
        Pace.restart();
        MovieService.nextPage(url, function (response) {
            $scope.movies = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        Pace.restart();
        MovieService.previousPage(url, function (response) {
            $scope.movies = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
    };

    $scope.getTheatres();

    //$scope.$watch('theatres', function (theatre) {
    //    if(theatre) {
    //        $('#theatreId').chosen();
    //    }
    //});

}]);

app.service("MovieService", ['APIService', function (APIService) {

    this.getAllMovies = function (successHandler, errorHandler) {
        APIService.get("/api/movies", successHandler, errorHandler);
    };

    this.saveMovie = function (movieDetails, successHandler, errorHandler) {
        APIService.post("/api/movie/save", movieDetails, successHandler, errorHandler);
    };

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/movie/search/" + param, successHandler, errorHandler);
    };

    this.updateMovie = function (movieId, movieDetails, successHandler, errorHandler) {
        APIService.putWithOptions("/api/movie/update?id=" + movieId, movieDetails, {
            transformRequest: angular.identity,
            headers: {
                'Content-Type': undefined
            }
        }, successHandler, errorHandler);
    };

    this.countMovies = function (successHandler, errorHandler) {
        APIService.get('/api/movies/count', successHandler, errorHandler);
    };

    this.deleteMovie = function (id, successHandler, errorHandler) {
        APIService.delete('/api/movie/delete/' + id, successHandler, errorHandler);
    };

    this.getCategories = function (successHandler, errorHandler) {
        APIService.get('/api/categories', successHandler, errorHandler);
    };

    this.getTheatres = function (successHandler, errorHandler) {
        APIService.get('/theatre', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };
}]);

app.directive("fileModel", ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function () {
                scope.$apply(function () {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);