<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];
}
