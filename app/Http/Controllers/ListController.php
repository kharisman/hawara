<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use App\Models\User;
use App\Models\Post;
use App\Models\Apply;

class ListController extends Controller
{
    public function save_image($description)
    {
        if (!empty($description)){
            $dom = new \DomDocument();
            @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                

                if ( !strstr( $data, 'upload' ) ) {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name= "/upload/" . time().$k.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                } else {
                    // return false ;
                }
            }
            $description = $dom->saveHTML();
        }

        return $description ;
    }
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
        $apply = Apply::where("id",$id)->with("formData.work")->with("formData.study")->firstOrFail();

        return view('list.detail', compact('apply'));
    }

    public function updateStatus(Request $request, $id)
    {
        $apply = Apply::find($id);
    
        if (!$apply) {
            return redirect()->back()->with('error', 'Applicant not found');
        }
    
        $status = $request->input('status');
    
        // Set status apply sesuai permintaan
        if ($status === 'pending') {
            $apply->status = 'Pending';
        } elseif ($status === 'gagal') {
            $apply->status = 'Gagal';
            $apply->save();
            return redirect()->route('list.index')->with('success', 'Status apply berhasil diperbarui');
        } elseif ($status === 'berhasil') {
            $apply->status = 'Berhasil';
        } else {
            return redirect()->back()->with('error', 'Invalid status');
        }
        
        // Simpan perubahan status ke database
        $apply->save();

        return redirect()->back()->with('success', 'Status apply berhasil diperbarui');
        
    }    
    
    public function updateData(Request $request, $id) {
        $apply = Apply::where("id",$id)->firstOrFail();
        // return $apply ;
        try {
            
            $description = $request->keterangan ;
            if (!empty($description)){
                $dom = new \DomDocument();
                @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
                $images = $dom->getElementsByTagName('img');
                foreach($images as $k => $img){
                    $data = $img->getAttribute('src');

                    
                    if ( !strstr( $data, 'upload' ) ) {
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                        $image_name= "/upload/" . time().$k.'.png';
                        $path = public_path() . $image_name;
                        file_put_contents($path, $data);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $image_name);
                    } else {
                        // return false ;
                    }
                }
                $description = $dom->saveHTML();
            };
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    
        $apply->kode = $request->input('kode');
        $apply->keterangan = $description;
        $apply->save();
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        
    }         
    
}
