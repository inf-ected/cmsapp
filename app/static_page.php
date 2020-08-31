<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class static_page extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'content','published'
    ];

    protected $table ='static_pages';


}
