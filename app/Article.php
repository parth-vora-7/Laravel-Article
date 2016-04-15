<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    protected $fillable = [
        'title',
        'text',
        'published_at'
    ];
    protected $dates = ['published_at'];
    
    public function user() {
        return $this->belongsTo('User');
    }
}
