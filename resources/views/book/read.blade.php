@extends('template')

@section('content')
    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" ng-controller="ReadCtrl">
        <div style="max-width: 100%">
            <h2 style="margin: 0px;">Название</h2>
            <h3>
                <strong>Описание:</strong> hf,ydq nt<br>
                <strong>Жанр:</strong> hf,ydq nt<br>
                <span>
                    <strong style="cursor: pointer" ng-click="list = (list == false) ? true : false ">
                        @{{ (list == false) ? "Показать оглавление" : "Скрыть оглавление" }}
                    </strong>
                </span>
            </h3>
            <ul ng-show="list">
                <li><a href="#">Глава 1</a></li>
                <li><a href="#">Глава 2</a></li>
                <li><a href="#">Глава 3</a></li>
            </ul>
        </div>
    </div>
    <script>
        pageApp.controller('ReadCtrl', function ($scope,$http,$cookies) {
            $scope.list = false; 
        });
    </script>
@endsection
