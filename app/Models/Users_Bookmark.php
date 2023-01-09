<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Bookmark extends Model
{
    use HasFactory;

    protected $table = 'users_bookmark';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assets()
    {
        return $this->belongsTo(Upload::class, 'novel_id', 'id');
    }
}
