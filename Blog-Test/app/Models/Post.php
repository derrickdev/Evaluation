<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Les attributs assignables en masse.
     *
     */
    protected $fillable = [
        'title',          
        'content',        
        'author',         
    ];
}
