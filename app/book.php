<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function authors()
    {
      return $this->belongsToMany('App\author','author_books','book_id','author_id');
    }

    public function heading()
    {
      return $this->belongsTo('App\heading','books_heading');
    }

    public function language()
    {
      return $this->belongsTo('App\language','books_lang');
    }

    public function phouse()
    {
      return $this->belongsTo('App\phouse','books_phouse');
    }

    public function book_items()
    {
      return $this->hasMany('App\book_item');
    }
}
