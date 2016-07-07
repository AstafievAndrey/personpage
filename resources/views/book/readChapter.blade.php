@extends('template')
@extends('book.read')

@section('chapter')
    <h3>{{$chapter->name}}</h3>
    <?php echo $chapter->text; ?>
@endsection

