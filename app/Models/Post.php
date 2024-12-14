<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'post_author');
    }

    //
    public function getRouteKeyName()
    {
        return "post_name"; // Use 'post_name' as the route key
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $field = $field ?? $this->getRouteKeyName();
        $encodedValue = urlencode($value); // Encode the slug for database matching

        return $this->where($field, $encodedValue)->first();
    }
}
