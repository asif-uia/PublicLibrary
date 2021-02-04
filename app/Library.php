<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'book_name',
        'author',
        'edition',
        'publisher',
        'publishing_year',
        'total_copies'
    ];
}
