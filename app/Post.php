<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //

    protected $fillable = [
        'title',
        'content',
        'slug',
    ];

    static public function generateSlug($originalStr)
    {
        $baseSlug = Str::of($originalStr)->slug('-');
        $slug = $baseSlug;

        $_index = 1;
        while (self::where('slug', $slug)->first()) {
            $slug = "$baseSlug-$_index";
            $_index++;
        }
        return $slug;
    }
}