@extends('template')

@section('content')
    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" ng-controller="ReadCtrl">
        <div style="max-width: 100%">
            <h3>
                <strong>Описание:</strong> {{$book->text}}<br>
                <strong>Жанр:</strong> {{$book->genres}}<br>
                <span>
                    <strong style="cursor: pointer" ng-click="list = (list == false) ? true : false ">
                        @{{ (list == false) ? "Показать оглавление" : "Скрыть оглавление" }}
                    </strong>
                </span>
            </h3>
            <ul ng-show="list">
                @if(count($chapters)>0)
                    @foreach ($chapters as $chapter)
                        <li><a href="{{ url('/read/'.$book->translit.'/'.$chapter->translit) }}">{{$chapter->name}}</a></li>
                    @endforeach
                @else
                    <li>Пока не написано ни одной главы</li>
                @endif
            </ul>
            <article>
                @yield('chapter')
            </article>
        </div>
    </div>
    <script>
        pageApp.controller('ReadCtrl', function ($scope,$http,$cookies) {
            $scope.list = false; 
        });
    </script>
@endsection
