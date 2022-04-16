<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NotaFaktur;
use Illuminate\Http\Request;

class NotaFakturController extends Controller
{
    public function index()
    {
        $emp_number = auth()->user()->emp_number;
        $nota = NotaFaktur::when($emp_number != null, function($q) use ($emp_number) {
            $q->where('notaId', 'LIKE', '%'. $emp_number . '%');
        })->orderBy('id', 'DESC')->get();
        return response()->json($nota);
    }

    public function store(Request $request)
    {

        // $ambil = DB::table('nota_faktur')->select('notaId')->orderBy('notaId', 'DESC')->get();
        $ambil = NotaFaktur::select('notaId')->orderBy('notaId', 'DESC')->get();

        if ($ambil) {
            $string = substr($ambil[0]->notaId,10);
            $lastId = number_format($string)+1;
            $nomerFak = sprintf("%03d",$lastId);
        }
        else {
            $nomerFak = "0001";
        }

        $nota = NotaFaktur::create([
            'notaId' => $request->notaId."-".$nomerFak,
            'nama' => $request->nama,
            'nomor_telfon' => $request->nomor_telfon,
            'nama_produk' => $request->nama_produk,
            'qty_produk' =>$request->qty_produk,
            'harga_produk' => $request->harga_produk,
            'subtotal_harga' => $request ->subtotal_harga,
        ]);
        return response()->json($nota);
    }
}
