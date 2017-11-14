@extends ('admin.layouts.app_admin')
@section('content')
<div class="container">
    <h2>Книги<h2>
    @if(count($books)>0)
        @foreach ($books as $book)
            <div class="col-sm-6 well">
                <div class="col-sm-4">
                <img style="width:100%" src="../storage/cover_images/{{$book->books_image}}">
                </div>
                <div class="col-sm-8">
                <h4><a href="{{ url('/admin/books/'.$book->id) }}">{{$book->books_name}}</a></h4>
                <h5>Год издания: {{$book->books_year}}</h5>
                <h5>Автор: 
                    @foreach ($book->authors as $author)
                        @if($loop->first)
                            {{$author->author_name}} {{$author->author_surname}} {{$author->author_middlename}}
                        @else
                            , {{$author->author_name}} {{$author->author_surname}} {{$author->author_middlename}}
                        @endif
                    @endforeach
                </h5>
                <h5>Направление: {{$book->heading->heading_name}}</h5>
                <h5>Язык: {{$book->language->languages_name}}</h5>
                <h5>Издательство: {{$book->phouse->phouses_name}}</h5>
                <h5>Количество страниц: {{$book->books_pages}}</h5>
                </div>
            </div>
        @endforeach
    @else
        <h1>not found</h1>   
    @endif
</div>
@endsection