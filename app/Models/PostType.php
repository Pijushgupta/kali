<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    //
    protected $table = 'post_types';

    protected $fillable = [
        'label',
        'name',
        'is_hidden',
        'taxonomy',
        'support',
        'hierarchical',
        'menu_icon',
        'slug'
    ];

    protected function casts(){
        return [
            'taxonomy' => 'array',
            'support' => 'array'
        ];
    }

}
