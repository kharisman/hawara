<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseller;
use App\Models\ResellerPayment;
use App\Models\ResellerProduct;
use App\Models\TimML;
use Illuminate\Validation\Rule;
use App\Models\User;

class SettingController extends Controller
{
    //
    public function user_data(Request $request)
    {
        // return 121 ;
        $datas = User::get();
        return view('setting.user_data',compact('datas'));
    }

    public function user_add(Request $request)
    {
        return view('setting.user_add');
    }

    public function user_add_p(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_reports,email,NULL,id,deleted_at,NULL',
            'password' => 'required|confirmed|min:8',
            'roles' => 'required|in:Super Admin,Admin,Operator'
        ]);
        
        $user = new User;
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = \Hash::make($validatedData['password']);
        $user->roles = $validatedData['roles'];
        $user->save();

        if (!$user){
            return back()->with('error', 'Data user  berhasil disimpan. ');
        }
        return back()->with('success', 'Data user berhasil disimpan. ');
    }

    public function user_edit(Request $request)
    {
        $data= User::where("id", $request->id)->firstOrFail();
        // return $data ;
        return view('setting.user_edit', compact('data'));
    }

    

    public function user_edit_p(Request $request)
    {
        $user = User::findOrFail($request->id); // $id adalah ID pengguna yang akan diedit

        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_reports,email,'.$user->id.',id,deleted_at,NULL',
            'password' => 'nullable|confirmed|min:8', // password bisa tidak diubah
            'roles' => 'required|in:Super Admin,Admin,Operator'
        ]);

        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = \Hash::make($validatedData['password']);
        }
        $user->roles = $validatedData['roles'];
        $user->save();

        if (!$user){
            return back()->with('error', 'Data user gagal diupdate.');
        }
        return back()->with('success', 'Data user berhasil diupdate.');

    }



    public function user_delete_p(Request $request, $id)
    {
        $user = User::findOrFail($id); // $id adalah ID pengguna yang akan diedit

        if ($user->roles=="Super Admin"){
            return back()->with('error', 'Data user gagal dihapus. Super Admin tidak bisa dihpus');

        }
        $user->delete();

        if (!$user){
            return back()->with('error', 'Data user gagal dihapus.');
        }
        return back()->with('success', 'Data user berhasil dihapus.');

    }

    public function user_edit_self(Request $request)
    {
        $data= User::where("id", \Auth::user()->id)->firstOrFail();
        // return $data ;
        return view('setting.user_edit_self', compact('data'));
    }


    public function user_edit_self_p(Request $request)
    {
        $user = User::findOrFail(\Auth::user()->id); // $id adalah ID pengguna yang akan diedit

        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_reports,email,'.$user->id.',id,deleted_at,NULL',
            'password' => 'nullable|confirmed|min:8', // password bisa tidak diubah
            'roles' => 'required|in:Super Admin,Admin,Operator'
        ]);

        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = \Hash::make($validatedData['password']);
        }
        $user->roles = $validatedData['roles'];
        $user->save();

        if (!$user){
            return back()->with('error', 'Data profile gagal diupdate.');
        }
        return back()->with('success', 'Data profile berhasil diupdate.');

    }
}
