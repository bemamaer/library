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
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->search;
        $books=book::where('books_name','like','%'.$search.'%')
                    ->orwhereHas('authors',function($query) use ($search)
                    {
                        $query->where('author_name',$search)
                              ->orwhere('author_surname',$search)
                              ->orwhere('author_middlename',$search);
                    })
                    ->get();                 
        $books->load('authors', 'heading','language');
        return view('books/index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=book::find($id);
        return view('books/show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=book::find($id);
        $headings = heading::orderBy('heading_name', 'asc')->get();
        $languages=language::orderBy('languages_name', 'asc')->get();
        $phouses=phouse::orderBy('phouses_name', 'asc')->get();
        return view('books/edit')->with('book',$book)
                                ->with('headings',$headings)
                                ->with('lang',$languages)
                                ->with('phouses',$phouses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 
        $book = book::find($id);
        $book->books_name = $request->name;
        $book->books_heading=$request->heading;
        $book->books_lang=$request->lang;
        $book->books_pages=$request->pages;
        $book->books_phouse=$request->phouse;
        $book->books_year=$request->year;
        $book->books_descrip=$request->descrip;
        if($request->hasFile('cover_image')){
            $book->books_image = $fileNameToStore;
        }
        $book->save();
        return redirect('admin/books/'.$book->id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::find($id);
        $authors=author_book::where('book_id',$id)->delete();  
        $book->delete();
        return redirect('admin/');
    }
}
