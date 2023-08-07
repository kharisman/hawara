<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    public function formData()
    {
<<<<<<< HEAD
        return $this->hasOne(FormData::class);
=======
        return $this->belongsTo(FormData::class,"form_data_id");
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
    }

    public function user()
    {
<<<<<<< HEAD
        return $this->hasOne(User::class, 'id', 'user_id');
=======
        return $this->belongsTo(User::class, 'user_id');
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
    }

    protected $fillable = [
        'user_id',
        'apply_id',
        'post_id',
<<<<<<< HEAD
=======
        'form_data_id',
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
    ];
}