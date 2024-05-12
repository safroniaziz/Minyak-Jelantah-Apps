<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Konten;

class InformationController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $judul = $request->input('judul');
        $types = $request->input('types');

        // $price_from = $request->input('price_from');
        // $price_to = $request->input('price_to');

        // $rate_from = $request->input('rate_from');
        // $rate_to = $request->input('rate_to');

        if($id)
        {
            $information = Konten::find($id);

            if($information)
                return ResponseFormatter::success(
                    $information,
                    'Data informasi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data informasi tidak ada',
                    404
                );
        }

        $food = Konten::whereIn('tujuan_konten', ['semua', 'kurir', 'mitra']);

        if ($judul) {
            $food->where('judul', 'like', '%' . $judul . '%');
        }

        if ($types) {
            $food->where('tujuan_konten', 'like', '%' . $types . '%');
        }

// Sekarang, Anda bisa melanjutkan penggunaan $food untuk mengeksekusi query


        // if($price_from)
        //     $food->where('price', '>=', $price_from);

        // if($price_to)
        //     $food->where('price', '<=', $price_to);

        // if($rate_from)
        //     $food->where('rate', '>=', $rate_from);

        // if($rate_to)
        //     $food->where('rate', '<=', $rate_to);

        return ResponseFormatter::success(
            $food->paginate($limit),
            'Data list informasi berhasil diambil'
        );
    }
}
