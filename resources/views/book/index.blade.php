@extends('template')

@section('content')
<!--    <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <h1>Книги</h1>
    </div>-->
    <?php
        foreach($books as $book){
    ?>
        <div class="mdl-cell mdl-cell--4-col">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                    <h2 class="mdl-card__title-text"><?php echo $book->name; ?></h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Жанр: <?php echo $book->genres;?><br>
                    Описание: <?php echo $book->text; ?><br>
                    Кол-во глав: <?php echo $book->count;?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="{{ url('/read/'.$book->translit) }}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Читать</a>
                </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
        </div>
    <?php
        }
    ?>
@endsection
