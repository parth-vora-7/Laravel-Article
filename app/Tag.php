<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Get articles assigned to a tag
     * 
     * @return mix
     */
    public function articles() {
        return $this->belongsToMany('App\Article');
    }

}
