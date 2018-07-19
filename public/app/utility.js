app.controller('UtilityController', ['$scope', 'UtilityService', function ($scope, UtilityService) {

    $scope.cartCount = 0;

    $scope.initialize = function () {
        $scope.getCartCount();
        $scope.getHotMovies();
    };

    $scope.getCartCount = function () {
        UtilityService.getCartCount(function (response) {
            $scope.cartCount = response.data;
        }, function (response) {
            console.log("error occured while getting count of the cart");
        });
    };

    $scope.getHotMovies = function () {
        UtilityService.getHotMovies(function (response) {
            $scope.hotMovies = response.data;
            $scope.hotMovies.data = shuffle($scope.hotMovies.data);
            $scope.hotMovies.data = $scope.hotMovies.data.splice(0, 2);
        }, function () {
            console.log("error in getting hot movies");
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
}]);

app.service('UtilityService', ['APIService', function (APIService) {

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.getHotMovies = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/movies/status/" + status + "", successHandler, errorHandler);
    };
}]);