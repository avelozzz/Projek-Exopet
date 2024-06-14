<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exopet;

class APIController extends Controller
{
    public function searchexopet(Request $request)
    {
        $cari = $request->input('q');

        $exopet = Exopet::where('title', 'LIKE', "%$cari%")->get();

        if ($exopet->isEmpty())
        {
            return response()->json([
                                    'success' => false,
                                    'data' => 'Data Tidak Ditemukan'
                                    ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else
        {
            return response()->json([
                                            'success' => true,
                                            'data' =>  $exopet
                                            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }

    }
}
