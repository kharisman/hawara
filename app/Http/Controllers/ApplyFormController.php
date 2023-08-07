<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Post;
use App\Models\FormData;
use Illuminate\Http\Request;

class ApplyFormController extends Controller
{
    public function showForm()
    {
        // Tampilkan view form
        return view('apply');
    }

    public function submitForm(Request $request)
    {
        // Validasi data input
        $request->validate([
            'ktp_text' => 'required',
            'ktp_provinsi' => 'required',
            'ktp_kota' => 'required',
            'ktp_kecamatan' => 'required',
            'ktp_kodepos' => 'required',
            'domisili_text' => 'required',
            'domisili_provinsi' => 'required',
            'domisili_kota' => 'required',
            'domisili_kecamatan' => 'required',
            'domisili_kodepos' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tingkatan' => 'required',
            'nilai_akhir' => 'required',
            'status' => 'required',
            'tanggal_lulus' => 'required',
            'nama_perusahaan' => 'required',
            'periode_kerja' => 'required',
            'jabatan' => 'required',
            'status_pekerjaan' => 'required',
            //'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Upload file CV
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = time() . '.' . $cvFile->getClientOriginalExtension();
            $cvFile->move(public_path('uploads'), $cvFileName);
        } else {
            $cvFileName = null;
        }

        // Simpan data input ke database
        $formData = FormData::create([
            'ktp_text' => $request->input('ktp_text'),
            'ktp_provinsi' => $request->input('ktp_provinsi'),
            'ktp_kota' => $request->input('ktp_kota'),
            'ktp_kecamatan' => $request->input('ktp_kecamatan'),
            'ktp_kodepos' => $request->input('ktp_kodepos'),
            'domisili_text' => $request->input('domisili_text'),
            'domisili_provinsi' => $request->input('domisili_provinsi'),
            'domisili_kota' => $request->input('domisili_kota'),
            'domisili_kecamatan' => $request->input('domisili_kecamatan'),
            'domisili_kodepos' => $request->input('domisili_kodepos'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'jurusan' => $request->input('jurusan'),
            'tingkatan' => $request->input('tingkatan'),
            'nilai_akhir' => $request->input('nilai_akhir'),
            'status' => $request->input('status'),
            'tanggal_lulus' => $request->input('tanggal_lulus'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'periode_kerja' => $request->input('periode_kerja'),
            'jabatan' => $request->input('jabatan'),
            'status_pekerjaan' => $request->input('status_pekerjaan'),
            'cv' => $cvFileName,
        ]);

        $apply = Apply::create([
            'user_id' => auth()->user()->id, // Assign the ID of the authenticated user
            // Add other fields here that are not available in the form
        ]);

        $postTitle = $request->input('title');
        $post = Post::where('title', $postTitle)->first();
        $postId = $post ? $post->id : null;

        $apply->formData()->save($formData);
        $apply->post_id = $postId;
        $apply->save();

        // Redirect ke halaman sukses atau tampilan lainnya
        return redirect()->back()->with('success', 'Biodata berhasil diunggah.');
    }
}
