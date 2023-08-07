<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use App\Models\User;
use App\Models\Post;
use App\Models\Apply;

class ListController extends Controller
{
    public function index()
    {
        $applies = Apply::with('formData', 'user')->get();
        return view('list.index', compact('applies'));
    }

    public function show($id)
    {
        // Kode untuk menampilkan data dengan ID tertentu
        $data = Data::find($id);
        return view('list.show', compact('data'));
    }

    public function destroy($id)
    {
        // Kode untuk menghapus data dengan ID tertentu
        $data = Data::find($id);
        $data->delete();

        // Redirect ke halaman index setelah menghapus data
        return redirect()->route('list.index')->with('success', 'Data berhasil dihapus');
    }
}
