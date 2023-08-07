<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'ktp_text',
        'ktp_provinsi',
        'ktp_kota',
        // Tambahkan atribut lainnya sesuai dengan field pada tabel
    ];
}
