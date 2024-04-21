<?php

namespace App\Http\Controllers;

use App\Models\Narahubung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NarahubungController extends Controller
{
    public function index(){
        $narahubungs = Narahubung::all();
        return view('narahubung.index',[
            'narahubungs' =>  $narahubungs,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul'      => 'required',
            'kontak'        => 'required',
        ], [
            'judul.required'        => 'Judul harus diisi.',
            'kontak.required'          => 'Kontak harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $attributes = [
            'judul'           =>  $request->judul,
            'kontak'       =>  $request->kontak,
        ];

        $create = Narahubung::create($attributes);

        if ($create) {
            return response()->json([
                'text'  =>  'Berhasil, data berhasil disimpan',
                'url'   =>  route('narahubung'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, gagal disimpan']);
        }
    }

    public function edit(Narahubung $narahubung){
        return $narahubung;
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'judul'      => 'required',
            'kontak'        => 'required',
        ], [
            'judul.required'        => 'Judul harus diisi.',
            'kontak.required'          => 'Kontak harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $narahubung = Narahubung::where('id',$request->id)->first();

        $update = $narahubung->update([
            'judul'                         =>  $request->judul,
            'kontak'                         =>  $request->kontak,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data berhasil diupdate',
                'url'   =>  route('narahubung'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, gagal diupdate']);
        }
    }

    public function delete(Narahubung $narahubung){
        $delete = $narahubung->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data berhasil dihapus',
                'url'   =>  route('narahubung'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, gagal dihapus']);
        }
    }
}
