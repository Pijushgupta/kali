<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    //
    protected $table = 'users_meta';

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
