<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function article() {
        return belongsTo(Article::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}