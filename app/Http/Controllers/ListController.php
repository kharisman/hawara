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

    public function check()
    {
        $applies = Apply::with('formData', 'user')->get();
        return view('check.index', compact('applies'));
    }

    public function show($id)
    {
        // Kode untuk menampilkan data dengan ID tertentu
        $data = Data::find($id);
        return view('list.show', compact('data'));
    }

    public function delete($id)
    {
        // Find the apply based on the ID
        $apply = Apply::findOrFail($id);

        // Delete the apply
        $apply->delete();

        // Redirect to the list index with success message
        return redirect()->back()->with('success', 'Apply berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Perform the query to search based on the 'name' column in the 'users' table
        $applies = Apply::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'DESC')->get();

        return view('list.index', compact('applies'));
    }

    public function view($id)
    {
        $apply = Apply::find($id);

        if (!$apply) {
            return redirect()->back()->with('error', 'Applicant not found');
        }

        return view('list.detail', compact('apply'));
    }

    public function updateStatus($id, $status)
    {
        $apply = Apply::find($id);

        if (!$apply) {
            return redirect()->back()->with('error', 'Applicant not found');
        }

        // Set status apply sesuai permintaan
        if ($status === 'pending') {
            $apply->status = 'Pending';
        } elseif ($status === 'gagal') {
            $apply->status = 'Gagal';
        } elseif ($status === 'berhasil') {
            $apply->status = 'Berhasil';
        } else {
            return redirect()->back()->with('error', 'Invalid status');
        }

        // Simpan perubahan status ke database
        $apply->save();

        return redirect()->back()->with('success', 'Status apply berhasil diperbarui');
    }

    public function checkDetail($id)
    {
        $apply = Apply::find($id);

        if (!$apply) {
            return redirect()->back()->with('error', 'Applicant not found');
        }

        return view('check.detail', compact('apply'));
    }


}
