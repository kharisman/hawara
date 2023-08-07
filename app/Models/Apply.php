<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    public function formData()
    {
        return $this->belongsTo(FormData::class,"form_data_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'user_id',
        'apply_id',
        'post_id',
        'form_data_id',
    ];
}