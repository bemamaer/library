@extends ('admin.layouts.app_admin')
@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <img style="width:80%"src="../../../public/storage/cover_images/{{$book->books_image}}">
    </div>
    <div class="col-sm-7">
        <h2>{{$book->books_name}}<h2>
        <h4>Автор:
            @foreach ($book->authors as $author)
                @if($loop->first)
                    {{$author->author_name}} {{$author->author_surname}} {{$author->author_middlename}}
                @else
                    , {{$author->author_name}} {{$author->author_surname}} {{$author->author_middlename}}
                @endif
            @endforeach
        <h4>
        <h4>Год издания: {{$book->books_year}}</h4>
        <h4>Направление: {{$book->heading->heading_name}}</h4>
        <h4>Язык: {{$book->language->languages_name}}</h4>
        <h4>Издательство: {{$book->phouse->phouses_name}}</h4>
        <h4>Количество страниц: {{$book->books_pages}}</h4>
        <h4>Количество экземпляров: <a href="{{ url('/admin/book_items/'.$book->id) }}">{{count($book->book_items)}}</a></h4>
        <h4>Описание:<br><br> {{$book->books_descrip}}</h4>
    </div>
</div>
<div class="col-sm-3">
    <div class="col-sm-6 ">
        <a class="btn btn-block btn-default" href="{{ url('/admin/books/'.$book->id.'/edit') }}">Edit</a>
    </div>
    <div class="col-sm-6 ">
    <form method="POST" action="{{ url('/admin/books/'.$book->id) }}"> 
        {{ csrf_field() }}
        {{method_field('DELETE')}}
        <button class="btn btn-block btn-default">Delete</button>
    </form>
    </div>
    </div>
</div>
@endsection