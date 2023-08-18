<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'ktp_text',
        'ktp_provinsi',
        'ktp_kota',
        'ktp_kecamatan',
        'ktp_kodepos',
        'domisili_text',
        'domisili_provinsi',
        'domisili_kota',
        'domisili_kecamatan',
        'domisili_kodepos',
        'nama_sekolah',
        'jurusan',
        'tingkatan',
        'nilai_akhir',
        'status',
        'tanggal_lulus',
        'nama_perusahaan',
        'periode_kerja',
        'jabatan',
        'status_pekerjaan',
        'cv',
    ];

    public function apply()
    {
        return $this->belongsTo(Apply::class);
    }

    public function work()
    {
        return $this->hasMany(Work::class);
    }


    public function study()
    {
        return $this->hasMany(Study::class);
    }
}
