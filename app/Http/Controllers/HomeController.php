<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nota = DB::table('nota_faktur')-> get();
        $customer = DB::table('customer')->get();
        $kunjungan = DB::table('kunjungan')->get();

        // $sub = DB::table('nota_faktur')->select('subtotal_harga')->get();
        // $result = preg_replace("/[^0-9]/", "", $sub);


        return view('dashboard.index',['nota'=>$nota],['customer' => $customer],['kunjungan' => $kunjungan]);
    }

    // public function notaFaktur()
    // {
    //     // mengambil data dari table students
    //     // mengirim data nota ke view daftar
    //     return redirect('/', ['nota' => $nota]);
    // }

}
