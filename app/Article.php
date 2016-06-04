<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Article extends Model implements SluggableInterface
{
    use SoftDeletes;
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
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
        return $this->belongsTo('App\User');
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
    
     /**
     * To filter logged in users articles
     */
    
    public function scopeMyArticles($query) {
        return $query->where('user_id', Auth::User()->id);
    }
 
}
