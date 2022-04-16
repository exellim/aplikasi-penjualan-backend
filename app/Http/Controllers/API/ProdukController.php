<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'success','data' => $produk]);
    }

    // Show all Customer names
    public function store(Request $request)
    {
        $produk = Produk::create($request->all());
        return response()->json(['message' => 'success','data' => $produk]);
    }

    public function search($produk)
    {
        $produk = Produk::where('nama','LIKE', '%'.$produk.'%')->sortBy('nama','DESC')->get();
        return response()->json(['message' => 'success','data' => $produk]);
    }
}
