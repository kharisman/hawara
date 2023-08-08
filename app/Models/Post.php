<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'description',
        'periode',
        // Kolom lain yang ingin Anda tambahkan
    ];
}
