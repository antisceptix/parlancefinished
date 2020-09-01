<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Set mass-assignable fields
    protected $fillable = ['title', 'content', 'slug'];
}

  