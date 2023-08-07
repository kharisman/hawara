<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'description',
        // Kolom lain yang ingin Anda tambahkan
    ];
}
