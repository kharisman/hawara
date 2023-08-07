<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ktp_text' => 'nullable',
            'ktp_provinsi' => 'nullable',
            'ktp_kota' => 'nullable',
            'ktp_kecamatan' => 'nullable',
            'ktp_kodepos' => 'nullable',
            'domisili_text' => 'nullable',
            'domisili_provinsi' => 'nullable',
            'domisili_kota' => 'nullable',
            'domisili_kecamatan' => 'nullable',
            'domisili_kodepos' => 'nullable',
            'nama_sekolah' => 'nullable',
            'jurusan' => 'nullable',
            'tingkatan' => 'nullable',
            'nilai_akhir' => 'nullable',
            'status_lulus' => 'nullable',
            'tanggal_lulus' => 'nullable|date',
            'nama_perusahaan' => 'nullable',
            'periode_kerja' => 'nullable',
            'jabatan' => 'nullable',
            'status_pekerjaan' => 'nullable',
            'cv' => 'nullable|file',
        ]);

        $biodata = new Biodata;
        $biodata->ktp_text = $request->input('ktp_text');
        $biodata->ktp_provinsi = $request->input('ktp_provinsi');
        $biodata->ktp_kota = $request->input('ktp_kota');
        $biodata->ktp_kecamatan = $request->input('ktp_kecamatan');
        $biodata->ktp_kodepos = $request->input('ktp_kodepos');
        $biodata->domisili_text = $request->input('domisili_text');
        $biodata->domisili_provinsi = $request->input('domisili_provinsi');
        $biodata->domisili_kota = $request->input('domisili_kota');
        $biodata->domisili_kecamatan = $request->input('domisili_kecamatan');
        $biodata->domisili_kodepos = $request->input('domisili_kodepos');
        $biodata->nama_sekolah = $request->input('nama_sekolah');
        $biodata->jurusan = $request->input('jurusan');
        $biodata->tingkatan = $request->input('tingkatan');
        $biodata->nilai_akhir = $request->input('nilai_akhir');
        $biodata->status_lulus = $request->input('status_lulus');
        $biodata->tanggal_lulus = $request->input('tanggal_lulus');
        $biodata->nama_perusahaan = $request->input('nama_perusahaan');
        $biodata->periode_kerja = $request->input('periode_kerja');
        $biodata->jabatan = $request->input('jabatan');
        $biodata->status_pekerjaan = $request->input('status_pekerjaan');

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv');
            $biodata->cv_path = $cvPath;
        }

        $biodata->save();

        return redirect()->back()->with('success', 'Biodata berhasil disimpan.');
    }
}

