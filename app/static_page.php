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
        
      'title', 
      'url', 
      'content',
      'published'
    ];
    protected $hidden = ['id'];
    protected $table ='static_pages';

    public function tags(){
      return $this->belongsToMany(tag::class,'tag_content','content_id','tag_id')
      ->wherePivot('content_type',static_page::class);
    }

}
