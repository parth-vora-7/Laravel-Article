<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
        'published_at'
    ];
    protected $dates = ['published_at', 'deleted_at'];
    
    /**
     * Get author of a article
     * 
     * @return mix
     */
    
    public function user() 
    {
        return $this->belongsTo('User');
    }
    
    /**
     * To show only publihsed articles
     * 
     * @param mix $query
     * @return mix
     */
    
    public function scopePublished($query) 
    {
        $query->where('published_at', '<=' , Carbon::now()); 
    }
 
}
