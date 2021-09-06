<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function type()
    {
        return $this->hasOne('App\Models\Blog\Type');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Blog\Category');
    }
}
