<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Post;
use App\Models\FormData;
use App\Models\Work;
use App\Models\Study;
use Illuminate\Http\Request;
use DB;

class ApplyFormController extends Controller
{
    public function showForm($id)
    {
        // Tampilkan view form
        $post = Post::where("id", $id)->firstOrFail();
        return view('apply',compact('post'));
    }

    public function submitForm(Request $request, $id)
    {
        // Validasi data input
        $post = Post::where("id", $id)->firstOrFail();
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
            'cv' => 'required|file|mimes:pdf',
        ]);

        // Upload file CV
        $cvFileName = null ;
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = time() . '.' . $cvFile->getClientOriginalExtension();
            $cvFile->move(public_path('pdf'), $cvFileName);
        } else {
            $cvFileName = null;
        }
        
        DB::beginTransaction();
        try {

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
                'user_id' => Auth()->user()->id ,
                'cv' => $cvFileName,
            ]);

            $postId = $post ? $post->id : null ;
            $apply = new Apply();
            $apply->post_id = $postId ;
            $apply->form_data_id = $formData->id;
            $apply->cv = $cvFileName;
            $apply->user_id = Auth()->user()->id;
            $apply->save();

            // dd($request->nama_sekolah, $request->jurusan, $request->status, $request->tahun_lulus  );

            foreach ($request->nama_sekolah as $key => $value) {
                $study = new Study();
                $study->form_data_id = $formData->id;
                $study->nama_sekolah = $value;
                $study->jurusan = $request->jurusan[$key];
                $study->status = $request->status[$key];
                $study->tahun_lulus = $request->tahun_lulus[$key];
                $study->save();
            }

            foreach ($request->nama_perusahaan as $key => $value) {
                $per  = explode(" - ",$request->periode_kerja[$key]) ;
                $work = new work();
                $work->form_data_id = $formData->id;
                $work->nama_perusahaan = $value;
                $work->jabatan = $request->jabatan[$key];
                $work->periode_kerja_awal = $per[0];
                $work->periode_kerja_akhir = $per[1];
                $work->save();
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollback();
            return redirect()->back()->with('error', 'Biodata gagal diunggah.');
        }

        DB::commit();
        return redirect()->back()->with('success', 'Biodata berhasil diunggah.');
    }
}
