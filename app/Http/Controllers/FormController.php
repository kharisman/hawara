<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data form
        // return $request;
        $validatedData = $request->validate([
            'ktp_text' => 'required',
            'ktp_provinsi' => 'required',
            'ktp_kota' => 'required',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Buat instance model Biodata
        $biodata = new Biodata();

        // Set nilai atribut model dari input form
        $biodata->ktp_text = $request->input('ktp_text');
        $biodata->ktp_provinsi = $request->input('ktp_provinsi');
        $biodata->ktp_kota = $request->input('ktp_kota');
        // Set atribut lainnya sesuai dengan field pada form

        // Simpan data ke dalam database
        $biodata->save();

        // Redirect atau tampilkan pesan berhasil jika diperlukan
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
