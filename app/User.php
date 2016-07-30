<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'profile_pic', 'contact_no', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get articles of a user
     * 
     * @return mix
     */
    
    public function articles() {
        return $this->hasMany('App\Article');
    }
    
    public function getSexAttribute($value) {
        if($value === 'M') {
            return 'Male';
        } else if($value === 'F') {
            return 'Female';
        }
    }
    
    public function setSexAttribute($value) {
        if($value === 'Male') {
             $this->attributes['sex'] = 'M';
        } else if($value === 'Female') {
            $this->attributes['sex'] = 'F';
        }
    }
    
    public function setUserPicAttribute($value) {
        dd($value);
    }
}
