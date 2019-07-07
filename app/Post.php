<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
     use Sluggable; // Basically we're using that trait here,basically that above class
     use SluggableScopeHelpers;
    // // Basically it's saying i want you to grab the title every time you save it and save it to the slug column
    // protected $sluggable = [
    //     'build_from' => 'title',
    //     'save_to'    => 'slug',
    //     'on_update'  => 'true'
    // ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }


    public function photo() {
        return $this->belongsTo("App\Photo");
    }

    public function category() {
        return $this->belongsTo("App\Category");
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder() {
        return "http://placehold.it/700x200";
    }
}
