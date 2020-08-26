<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function authors(){
        return $this->belongsToMany('App\Model\Author', 'book_authors');
    }

    protected $with = [ 'authors'];

    protected $hidden = ['created_at', 'updated_at'];

}
