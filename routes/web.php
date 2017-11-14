<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
  return view('test');
});
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']],function(){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::get('/create','DashboardController@create');
    Route::post('/create_heading','DashboardController@store_heading');
    Route::post('/create_language','DashboardController@store_lang'); 
    Route::post('/create_phouse','DashboardController@store_phouse'); 
    Route::post('/create_author','DashboardController@store_author'); 
    Route::get('/create2','DashboardController@authors');
    Route::post('/create_authors','DashboardController@store_authors');
    Route::post('/create_book','DashboardController@store_book');
    Route::get('/create2/{id}','DashboardController@book_author');
    Route::post('/create2','DashboardController@store_authors');
    Route::post('/books/{id}','BooksController@update');
    Route::resource('books','BooksController');
});

/*Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    
      return view('tasks', [
        'tasks' => $tasks
      ]);
});

  /*
  Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
      ]);
    
      if ($validator->fails()) {
        return redirect('/')
          ->withInput()
          ->withErrors($validator);
      }
      $task = new Task;
      $task->name = $request->name;
      $task->save();
    
      return redirect('/');
  });

  
  Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    
      return redirect('/');
  });*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
