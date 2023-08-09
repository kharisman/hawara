<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    public function getAnnouncementDateAttribute()
    {
        return $this->created_at->addDays($this->periode);
    }
}
