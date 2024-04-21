<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index(){
        $pengumumans = Konten::where('tipe_konten','pengumuman')->get();
        return view('pengumuman.index',[
            'pengumumans' =>  $pengumumans,
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'judul_konten'   =>  'required',
            'teks_konten'   =>  'required',
            'tujuan_konten' =>  'required',
            'file_konten' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
        ], [
            'judul_konten.required' => 'Judul konten harus diisi.',
            'teks_konten.required' => 'Teks konten harus diisi.',
            'tujuan_konten.required' => 'Tujuan konten harus diisi.',
            'file_konten.required' => 'File konten harus diisi.',
            'file_konten.image' => 'File harus berupa file gambar.',
            'file_konten.mimes' => 'Format file konten harus jpeg, png, jpg, atau gif.',
            'file_konten.max' => 'Ukuran file konten maksimum adalah 2MB.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        if ($request->hasFile('file_konten')) {
            $file_konten = $request->file('file_konten');

            // Memeriksa apakah file valid
            if ($file_konten->isValid()) {
                // Pindahkan file ke direktori public
                $path = $file_konten->move(public_path('pengumumans'), $file_konten->getClientOriginalName());

                // Jika pemindahan file berhasil, simpan data ke dalam database
                $attributes = [
                    'user_id'   =>  Auth::user()->id,
                    'file_kontent' => 'pengumumans/' . $file_konten->getClientOriginalName(), // Simpan path relatif dari direktori public
                    'judul_konten'   =>  $request->judul_konten,
                    'teks_konten'   =>  $request->teks_konten,
                    'tujuan_konten'   =>  $request->tujuan_konten,
                    'tipe_konten'       =>  'pengumuman',
                    // Tambahkan atribut lainnya sesuai kebutuhan
                ];
                Konten::create($attributes);

                // Beritahu pengguna bahwa data berhasil disimpan
                return response()->json([
                    'text' => 'Berhasil, data berhasil disimpan',
                    'url' => route('pengumuman'),
                ]);
            } else {
                // Jika file tidak valid, beri tahu pengguna bahwa file tidak dapat diunggah
                return response()->json(['error' => 0, 'text' => 'Gagal, file tidak valid.'], 422);
            }
        } else {
            // Jika tidak ada file yang diunggah, beri tahu pengguna bahwa file harus diunggah
            return response()->json(['error' => 0, 'text' => 'file_konten harus diunggah.'], 422);
        }
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'judul_konten'   =>  'required',
            'teks_konten'   =>  'required',
            'tujuan_konten' =>  'required',
            'file_konten' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
        ], [
            'judul_konten.required' => 'Judul konten harus diisi.',
            'teks_konten.required' => 'Teks konten harus diisi.',
            'tujuan_konten.required' => 'Tujuan konten harus diisi.',
            'file_konten.image' => 'File harus berupa file gambar.',
            'file_konten.mimes' => 'Format file konten harus jpeg, png, jpg, atau gif.',
            'file_konten.max' => 'Ukuran file konten maksimum adalah 2MB.',
        ]);

        $pengumuman = Konten::where('id',$request->id)->first();

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        if (!$pengumuman) {
            return response()->json(['error' => 0, 'text' => 'Konten tidak ditemukan.'], 404);
        }

        // Menyiapkan data untuk pembaruan
        $data = [
            'user_id'   =>  Auth::user()->id,
            'judul_konten'   =>  $request->judul_konten,
            'teks_konten'   =>  $request->teks_konten,
            'tujuan_konten'   =>  $request->tujuan_konten,
            'tipe_konten'       =>  'pengumuman',
        ];

        // Jika ada file yang diunggah, tambahkan path file ke dalam data
        if ($request->hasFile('file_konten')) {
            $file_konten = $request->file('file_konten');

            // Memeriksa apakah file valid
            if ($file_konten->isValid()) {
                // Hapus file lama jika ada
                if (File::exists(public_path($pengumuman->file_kontent))) {
                    File::delete(public_path($pengumuman->file_kontent));
                }

                // Pindahkan file ke direktori public
                $path = $file_konten->move(public_path('pengumumans'), $file_konten->getClientOriginalName());
                $data['file_kontent'] = 'pengumumans/' . $file_konten->getClientOriginalName(); // Simpan path relatif dari direktori public
            } else {
                // Jika file tidak valid, beri tahu pengguna bahwa file tidak dapat diunggah
                return response()->json(['error' => 0, 'text' => 'Gagal, file tidak valid.'], 422);
            }
        }

        // Melakukan pembaruan menggunakan metode update()
        $pengumuman->update($data);

        // Beritahu pengguna bahwa data berhasil diperbarui
        return response()->json([
            'text' => 'Berhasil, data berhasil diperbarui',
            'url' => route('pengumuman'),
        ]);
    }

    public function edit(Konten $pengumuman){
        return $pengumuman;
    }

    public function delete(Konten $pengumuman){
        $delete = $pengumuman->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data berhasil dihapus',
                'url'   =>  route('pengumuman'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, gagal dihapus']);
        }
    }
}
