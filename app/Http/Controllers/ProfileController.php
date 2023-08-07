<?php

namespace App\Http\Controllers;

use App\Models\yes;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\yes  $yes
     * @return \Illuminate\Http\Response
     */
    public function show(yes $yes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\yes  $yes
     * @return \Illuminate\Http\Response
     */
    public function edit(yes $yes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\yes  $yes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, yes $yes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\yes  $yes
     * @return \Illuminate\Http\Response
     */
    public function destroy(yes $yes)
    {
        //
    }

    public function register(Request $request)
    {

        $rules = [
            'nama'     => 'required|min:3|max:255',
            'nomor_telepon'     => 'required|min:11|max:16',
            'email'    => 'required|email|unique:user_reports',
<<<<<<< HEAD
            'password' => 'required|string|min:6|max:255'
=======
            'password' => 'required|string|min:6|max:255',
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1

            'alamatktp' => 'required|min:63|max:255',
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
}
