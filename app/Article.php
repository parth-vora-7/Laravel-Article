<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $fillable = [
//        'title',
//        'text',
//        'published_at'
//    ];
  protected $dates = ['published_at'];
}
