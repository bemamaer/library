@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
                <form class="form-horizontal" method="GET" action="{{ url('/admin/books') }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="search">Найти книгу</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-default">Поиск</button>
                        </div>
                    </div>               
                </form>
            <div class="col-sm-4">
                <a class="btn btn-block btn-default" href="{{url('admin/create')}}">Добавление</a>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-block btn-default" href="#">Выдача книги</a>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-block btn-default" href="#">Возврат книги</a>
            </div>
        </div>    
    </div> 
@endsection