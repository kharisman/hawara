<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;
use App\Models\Post;
use App\Models\Apply;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->roles=="Super Admin" or Auth::user()->roles=="Admin" ){
            $applies = Apply::all();
            $posts = Post::all();
            return view("home_admin", compact('applies', 'posts'));
        } else {
            $posts = Post::orderBy("id","DESC")->get();
            return view('home',compact('posts'));
        }
    }

    public function apply($id)
    {
        $post = Post::where("id", $id)->firstOrFail();
        return view('apply',compact('post'));
    }


    public function apply_p(Request $request, $id)
    {

        
        $post = Post::where("id",$id)->firstOrFail();
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF dengan ukuran maksimal 2MB
        ]);

        $existingCV = Apply::where('user_id', Auth::user()->id)
        ->where('post_id', $post->id)
        ->exists();

        if ($existingCV) {
        return redirect()->back()->with('error', 'Anda sudah mengunggah CV sebelumnya.');
        }


        if ($request->file('pdf')->isValid()) {
            $fileName = time() . '.' . $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move(public_path('pdf'), $fileName);
            
            $apply =  New Apply();
            $apply->user_id = Auth::user()->id;
            $apply->post_id = $post->id;
            $apply->cv = $fileName;
            $apply->save();

            return redirect()->back()->with('success', 'CV berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah CV.');
    }

    public function result(Request $request)
    {
        $apply = Apply::where("user_id", Auth::user()->id)->with("post")->with("formData")->get();
        return view('result', ['applies' => $apply]);
    }

    public function posting(Request $request){
        return view('posting.index');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $applies = Apply::where("user_id", $user->id)->get();
        
        return view('profile', ['user' => $user, 'applies' => $applies]);
    }


}
