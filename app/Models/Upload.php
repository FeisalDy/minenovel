<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Chapter;


class Upload extends Model
{
    use HasFactory;

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function users_bookmark()
    {
        return $this->hasMany(Users_Bookmark::class);
    }
}
