'use strict';

angular.module('app').controller('SystemCtrl', ['$scope', '$location', 'AuthService', 'Session', 'AUTH_EVENTS', 'Application', function($scope, $location, AuthService, Session, AUTH_EVENTS, Application) {

    $scope.credentials     = {
        username: '',
        password: ''
    };
    $scope.isAuthenticated     = AuthService.isAuthenticated;
    $scope.currentUser         = Session;
    $scope.applicationSelected = {};

    /**
     * Will be used on the $httpRequestInterceptor side, will add the id of the app in each $http Requests to the backend.
     */
    $scope.applications = Application.query(function(apps) {
        if (apps.length > 0) {
            $scope.applicationSelected = apps[0];

            $scope.$emit('app:changed', apps[0]);
        }
    });

    /**
     * Redirect after login
     */
    $scope.$on(AUTH_EVENTS.loginSuccess, function() {
        $location.path('/');
    });

    /**
     * Redirect after logout
     */
    $scope.$on(AUTH_EVENTS.logoutSuccess, function() {
        $location.path('/');
    });

    $scope.$on(AUTH_EVENTS.notAuthorized, function() {
        AuthService.logout();
    });

    /**
     * Trigger a login
     */
    $scope.login = function()
    {
        AuthService.login({
            _username: $scope.credentials.username,
            _password: $scope.credentials.password
        });
    };

    /**
     * Logout
     */
    $scope.logout = function()
    {
        AuthService.logout();
    };

}]);