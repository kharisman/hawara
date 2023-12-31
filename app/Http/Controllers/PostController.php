<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id","DESC")->get();
        return view('posting.index', compact('posts'));
    }

    public function view($id)
    {
        // Mengambil data post berdasarkan ID
        $post = Post::find($id);

        // Menampilkan view untuk melihat post
        return view('posting.view', compact('post'));
    }

    public function edit($id)
    {
        // Mengambil data post berdasarkan ID
        $post = Post::where("id",$id)->firstOrfail();

        // Menampilkan view untuk mengedit post
        return view('posting.edit', compact('post'));
    }

    public function delete($id)
    {
        // Find the post based on the ID
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        // Delete the post
        $post->delete();

        // Redirect to the posts index with success message
        return redirect()->back()->with('success', 'Post berhasil dihapus');
    }

    public function create()
    {
        // Menampilkan view untuk membuat post baru
        return view('posting.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'periode' => 'required',
        ]);

        $periode  = explode(" - ", $request->periode) ;
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->periode_awal = $periode[0] ;
        $post->periode_akhir = $periode[1];
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post baru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Validate data from the form
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'periode' => 'required',
        ]);

        // Find the post based on the provided ID
        $periode  = explode(" - ", $request->periode) ;
        $post = Post::where("id",$id)->firstOrfail();

        // Update the post with the new data
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->periode_awal = $periode[0] ;
        $post->periode_akhir = $periode[1];
        // ... add other fields as needed
        $post->save();

        // Redirect back to the detail view of the updated post
        return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Lakukan query untuk mencari berdasarkan judul post
        $posts = Post::where('title', 'LIKE', "%{$search}%")->orderBy('id', 'DESC')->get();

        return view('posting.index', compact('posts'));
    }
}
