<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function front()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('front');
    }
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login_v2');
    }

    public function forget()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('reset');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];


        Auth::attempt($data);
        if (Auth::check()) { 
            return redirect()->route('home');
        } else { 
            \Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function register(Request $request)
    {

        $rules = [
            'nama'     => 'required|min:3|max:255',
            'nomor_telepon'     => 'required|min:11|max:16',
            'email'    => 'required|email|unique:user_reports',
            'password' => 'required|string|min:6|max:255'
        ];
        
        $messages = [
            'nama.required'     => 'Nama wajib diisi',
            'nama.min'          => 'Nama minimal harus memiliki 3 karakter',
            'nama.max'          => 'Nama maksimal harus memiliki 255 karakter',
            'nomor_telepon.required'     => 'nomor telepon wajib diisi',
            'nomor_telepon.min'          => 'nomor telepon minimal harus memiliki 3 karakter',
            'nomor_telepon.max'          => 'nomor telepon maksimal harus memiliki 16 karakter',
            'email.required'    => 'Email wajib diisi',
            'email.email'       => 'Format email tidak valid',
            'email.unique'      => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.string'   => 'Password harus berupa string',
            'password.min'      => 'Password minimal harus memiliki 6 karakter',
            'password.max'      => 'Password maksimal harus memiliki 255 karakter'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        $user = new User;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->nomor_telepon = $request->input('nomor_telepon');
        $user->password = bcrypt($request->input('password')); // Menggunakan bcrypt untuk mengenkripsi password
        $user->roles = "user"; // Menggunakan bcrypt untuk mengenkripsi password
        $user->save();
        
        $data = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            \Session::flash('error', 'Registrasi gagal. Silahkan coba kembali.');
            return redirect()->route('front');
        }
        
    }

    public function forget_p(Request $request)
    {
        // return $request->email ;
        $rules = [
            'email'    => 'required|email|exist:user_reports'
        ];
        
        $messages = [
            'email.required'    => 'Email wajib diisi',
            'email.email'       => 'Format email tidak valid',
            'email.unique'      => 'Email tidak ditemukan',
        ];
        
        $user =  User::where("email",$request->email)->first();
        $user->remember_token = uniqid();
        $user->save();


        $data = [
            'kode' => $user->remember_token
        ];
    
        Mail::to($request->email)->send(new ResetMail($data));
    
        \Session::flash('success', "Konfirmasi berhasil dikirm ke email. Silahkan buka email Anda");
        return redirect('/lupa-password');
        
    }

    public function konfirmasi(Request $request, $id)
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('konfirmasi',compact('id'));
    }

    public function konfirmasi_p(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
                
        $user = User::where("remember_token",$id)->firstOrFail();
        $user->remember_token = null;
        $user->password = bcrypt($request->password); 
        $user->save();



        if ($user) {
            return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
        } else {
            return redirect()->back()->with('error', 'Gagal mereset password.');
        }
        
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login')->with("logout",  1);
    }
}
