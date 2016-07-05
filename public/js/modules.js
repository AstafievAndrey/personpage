var pageApp = angular.module('pageApp', ['ngCookies'], ['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.headers.common['X-Requested-With'] = "XMLHttpRequest";
//    параметр понадобиться после того как начнем юзать ключ
//    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=_token]').attr('content');
}]);