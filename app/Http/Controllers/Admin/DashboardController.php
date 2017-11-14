<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\heading;
use App\language;
use App\phouse;
use App\book;
use App\author;
use App\author_book;
class DashboardController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function create()
    {
        $headings = heading::orderBy('heading_name', 'asc')->get();
        $languages=language::orderBy('languages_name', 'asc')->get();
        $phouses=phouse::orderBy('phouses_name', 'asc')->get();
          return view('admin.create', [
            'headings' => $headings,
            'lang'=>$languages,
            'phouses'=>$phouses
          ]);
    }
    public function store_heading(Request $request)
    {
        $heading = new heading;
        $heading->heading_name = $request->heading_name;
        $heading->save();
        return back();
    }
    public function store_lang(Request $request)
    {
        $lang = new language;
        $lang->languages_name = $request->name;
        $lang->save();
        return back();
    }
    public function store_phouse(Request $request)
    {
        $phouse = new phouse;
        $phouse->phouses_name = $request->name;
        $phouse->phouses_adress=$request->adress;
        $phouse->phouses_tel=$request->tel;
        $phouse->save();
        return back();
    }
    public function store_author(Request $request)
    {
        $author = new author;
        $author->author_name = $request->name;
        $author->author_surname=$request->surname;
        $author->author_middlename=$request->middlename;
        $author->save();
        return back();
    }
    public function store_authors(Request $request)
    {
        $author_book = new author_book;
        $author_book->author_id = $request->author;
        $author_book->book_id=$request->book_id;
        var_dump($author_book);
        if( $request->has('main')) 
        {
            $author_book->author_main=1;
        }
        $author_book->save();      
        return redirect('admin/create2/'.$request->book_id.'');
    }
    public function store_book(Request $request)
    {
        $book = new book;
        $book->books_name = $request->name;
        $book->books_heading=$request->heading;
        $book->books_lang=$request->lang;
        $book->books_pages=$request->pages;
        $book->books_phouse=$request->phouse;
        $book->books_year=$request->year;
        $book->books_descrip=$request->descrip;
        $book->save();
        $authors = author::orderBy('author_name', 'asc')->get();
        return redirect('admin/create2/'.$book->id.'');
    }
    public function book_author($id)
    {
        $book=book::find($id);
        $authors = author::orderBy('author_name', 'asc')->get();
        return view('admin/create2',['book'=>$book,'authors'=>$authors]);
    }
}
