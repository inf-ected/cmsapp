<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video_page extends Model
{
    //
    protected $fillable = [
        'title', 'url', 'description','published'
    ];
    protected $hidden=['id'];
    protected $table ='video_pages';
}
