<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\book_item;
use App\book;
class BItemsController extends Controller
{
    public function store(Request $request)
    {
        for($i=0;$i<$request->amount;$i++)
        {
            $book_item=new book_item;
            $book_item->book_id=$request->book_id;
            $book_item->serial_number=uniqid();
            $book_item->save();
        }
        return back();
    }
    public function index($id)
    {
        $book_items=book_item::where('book_id',$id)->get();
        $book=book::find($id);
        return view('bookitems/index')->with('book_items',$book_items)->with('book',$book);
    }
    public function destroy($id)
    {
        $book_item=book_item::find($id);
        $book_item->delete();
        return back();
    }
}
