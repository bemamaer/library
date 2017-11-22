@extends ('admin.layouts.app_admin')
@section('content')
<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Экзепляры книги {{$book->books_name}}</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal" method="POST" action="{{ url('/admin/book_items') }}">  
                    {{ csrf_field() }}                 
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="amount"><h4>Количество экземпляров:</h4></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="amount" id="amount">
                            </div>
                            <input type="text" class="hidden" name="book_id" id="book_id" value="{{$book->id}}">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default">Добавить</button>
                            </div>
                        </div>  
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><h4>Id</h4></th>
                        <th><h4>Серийный номер</h4></th>
                        <th><h4>Дата поступления</h4></th>
                        <th><h4></h4></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($book_items as $book_item)               
                            <tr>
                                <td><h4>{{$book_item->id}}</h4></td>
                                <td><h4>{{$book_item->serial_number}}</h4></td>
                                <td><h4>{{$book_item->created_at}}</h4></td>
                                <td class="col-sm-1">
                                    <form method="POST" action="{{ url('/admin/book_items/'.$book_item->id) }}">            
                                    {{ csrf_field() }} 
                                    {{method_field('DELETE')}}                                  
                                    <button class="btn btn-block btn-default">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
</div>
@endsection