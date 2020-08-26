<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'pivot', 'id'];

    public function toArray()
    {
        return array_values($this->attributesToArray());
    }
}
