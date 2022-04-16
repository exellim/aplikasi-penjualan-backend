<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kunjungan = Kunjungan::orderBy('id', 'desc')->paginate(10);
        return view('kunjungan.index',['kunjungan' => $kunjungan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customer = Customer::orderBy('nama', 'ASC')->get();;
        $model = new Kunjungan;
        return view('kunjungan.create', ['model'=>$model, 'customer'=>$customer]);
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
        $model = new Kunjungan;
        $model->nama = $request->nama;
        $model->emp_number = $request->emp_number;
        $model->kunjungan_value = $request->kunjungan_value;
        $model->tujuan_value = $request->tujuan_value;
        $model->tanggal_tujuan = $request->tanggal_tujuan;
        $model->jam_mulai = $request->jam_mulai;
        $model->jam_selesai = $request->jam_selesai;
        $model->catatan = $request->catatan;
        $model->save();

        return redirect('kunjungan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::orderBy('nama', 'ASC')->get();;
        $model = Kunjungan::find($id);
        return view('kunjungan.edit', compact('model','customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $model = Kunjungan::find($id);
        $model->nama = $request->nama;
        $model->emp_number = $request->emp_number;
        $model->kunjungan_value = $request->kunjungan_value;
        $model->tujuan_value = $request->tujuan_value;
        $model->tanggal_tujuan = $request->tanggal_tujuan;
        $model->jam_mulai = $request->jam_mulai;
        $model->jam_selesai = $request->jam_selesai;
        $model->catatan = $request->catatan;
        $model->save();

        return redirect('kunjungan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = Kunjungan::find($id);
        $model->delete();
        return redirect('kunjungan');
    }

}
