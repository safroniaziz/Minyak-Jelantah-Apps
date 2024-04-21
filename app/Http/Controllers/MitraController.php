<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{
    public function index(){
        $mitras = User::where('role','mitra')->orderBy('created_at','desc')->get();
        return view('mitra.index',[
            'mitras' =>  $mitras,
        ]);
    }

    public function create(){
        return view('mitra.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'nomor_whatsapp' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ], [
            'nama_lengkap.required' => 'Kolom nama lengkap harus diisi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus diisi.',
            'nomor_whatsapp.required' => 'Nomor WhatsApp nama harus diisi.',
            'alamat.required' => 'Alamat nama harus diisi.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus memiliki setidaknya satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus seperti @$!%*?&',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $sudah = User::where('nomor_whatsapp', $request->nomor_whatsapp)->first();
        if ($sudah) {
            return response()->json(['error' => 0, 'text' => "Mohon maaf, nomor whatsapp sudah ditambahkan"], 422);
        }

        $simpan = User::create([
            'nama_lengkap'                                   =>  $request->nama_lengkap,
            'email'                                   =>  $request->email,
            'nomor_whatsapp'                                       =>  $request->nomor_whatsapp,
            'alamat'                                  =>  $request->alamat,
            'password'                              =>  Hash::make($request->password),
            'role'                              =>  'mitra',
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Berhasil, data mitra berhasil disimpan',
                'url'   =>  route('mitra'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data mitra gagal disimpan']);
        }
    }

    public function edit(User $mitra){
        return view('mitra.edit',[
            'mitra' =>  $mitra,
        ]);
    }

    public function update(Request $request, User $mitra){
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'nomor_whatsapp' => 'required',
            'alamat' => 'required',
        ], [
            'nama_lengkap.required' => 'Kolom nama lengkap harus diisi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus diisi.',
            'nomor_whatsapp.required' => 'Nomor WhatsApp nama harus diisi.',
            'alamat.required' => 'Alamat nama harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $update = User::where('id',$mitra->id)->update([
            'nama_lengkap'                                   =>  $request->nama_lengkap,
            'email'                                   =>  $request->email,
            'nomor_whatsapp'                                       =>  $request->nomor_whatsapp,
            'alamat'                                  =>  $request->alamat,
            'password'                              =>  Hash::make($request->password),
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data mitra berhasil diubah',
                'url'   =>  route('mitra'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data mitra gagal diubah']);
        }
    }

    public function delete(User $mitra){
        $delete = $mitra->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data mitra berhasil dihapus',
                'url'   =>  route('mitra'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data mitra gagal dihapus']);
        }
    }

    public function ubahPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8', // Panjang minimal 8 karakter
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                // Minimal 1 huruf kecil, 1 huruf besar, 1 angka, dan 1 karakter khusus
            ],
            'password_confirmation' => [
                'required',
                'same:password', // Memastikan bahwa password_confirmation sama dengan password
            ],
        ], [
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Panjang password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung minimal 1 huruf kecil, 1 huruf besar, 1 angka, dan 1 karakter khusus.',
            'password_confirmation.required' => 'Kolom konfirmasi password harus diisi.',
            'password_confirmation.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $ubahPassword = User::where('id',$request->id)->update([
            'password'  =>  Hash::make($request->password),
        ]);

        if ($ubahPassword) {
            return response()->json([
                'text'  =>  'Berhasil, data mitra berhasil dihapus',
                'url'   =>  route('mitra'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data mitra gagal dihapus']);
        }
    }
}
