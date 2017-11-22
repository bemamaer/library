@extends ('admin.layouts.app_admin')
@section('content')
<div class="container">
<div class="col-sm-4">
<div class="panel-group" id="accordion">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
      Добавить автора</a>
    </h4>
  </div>
  <div id="collapse1" class="panel-collapse collapse in">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_author') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Имя:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="surname">Фамилие:</label>
            <input type="name" class="form-control" name="surname" id="surname">
    </div>
    <div class="form-group">
        <label for="middlename">Отчество:</label>
            <input type="name" class="form-control" name="middlename" id="middlename">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
      Добавить направление</a>
    </h4>
  </div>
  <div id="collapse2" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_heading') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="heading_name">Направление:</label>
            <input type="text" class="form-control" name="heading_name" id="heading_name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
      Добавить язык</a>
    </h4>
  </div>
  <div id="collapse3" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_language') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Язык:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
      Добавить издательство</a>
    </h4>
  </div>
  <div id="collapse4" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_phouse') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Название:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="adress">Адрес:</label>
            <input type="name" class="form-control" name="adress" id="adress">
    </div>
    <div class="form-group">
        <label for="tel">Телефон:</label>
            <input type="name" class="form-control" name="tel" id="tel">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">Изменить книгу</h4>
</div>
<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ url('/admin/books/'.$book->id) }}" enctype="multipart/form-data"> 
    {{ csrf_field() }}  
    {{method_field('PUT')}}
    <div class="form-group">
        <label class="control-label col-sm-4" for="name">Название:</label>
        <div class="col-sm-7">
             <input type="text" class="form-control" name="name" id="name" value="{{$book->books_name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="heading">Направление:</label>
        <div class="col-sm-7">
            <select name="heading" class="form-control">
            @foreach ($headings as $heading)
                @if($heading->id==$book->books_heading)
                    <option value="{!! $heading->id !!}" selected>{!! $heading->heading_name !!}</option>
                @else
                    <option value="{!! $heading->id !!}">{!! $heading->heading_name !!}</option>
                @endif
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="lang">Язык:</label>
        <div class="col-sm-7">
            <select name="lang" class="form-control">
                @foreach ($lang as $lan)
                    @if($lan->id==$book->books_lang)
                        <option value="{!!$lan->id !!}" selected>{!! $lan->languages_name !!}</option>
                    @else
                        <option value="{!!$lan->id !!}">{!! $lan->languages_name !!}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="pages">Количество страниц:</label>
        <div class="col-sm-7">
             <input type="text" class="form-control" name="pages" id="pages" value="{{$book->books_pages}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="phouse">Издательство</label>
        <div class="col-sm-7">
            <select name="phouse" class="form-control">
                @foreach ($phouses as $phouse)
                    @if($phouse->id==$book->books_phouse)
                        <option value="{!! $phouse->id !!}" selected>{!! $phouse->phouses_name !!}</option>
                    @else
                        <option value="{!! $phouse->id !!}">{!! $phouse->phouses_name !!}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="year">Год издания:</label>
        <div class="col-sm-7">
             <input type="text" class="form-control" name="year" id="year" value="{{$book->books_year}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="descrip">Описание:</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="descrip" id="descrip" value="{{$book->books_descrip}}">
        </div>
    </div>
    <div class="form-group"> 
        <label class="control-label col-sm-4" for="fileToUpload">Загрузить обложку:</label>
        <div class="col-sm-7">
            <input type="file" name="cover_image" id="cover_image">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-7">
            <button type="submit" class="btn btn-default">Далее</button>
        </div>
    </div>
</form>
</div>
</div>
</div> 
</div>
@endsection