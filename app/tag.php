<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    protected $hidden =['id'];

    protected $table='tags';

    public function static_pges(){
        return $this->belongsToMany(static_page::class,'tag_content')
        ->wherePivot('content_type',static_page::class);
      }
    public function video_pges(){
        return $this->belongsToMany(video_page::class,'tag_content')
        ->wherePivot('content_type',video_page::class);
      }
                 


}
