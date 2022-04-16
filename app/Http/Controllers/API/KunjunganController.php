<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\KunjunganResource;
use App\Models\Kunjungan;
use Validator;


class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kunjungan = Kunjungan::orderBy('id', 'DESC')->get();
        // $kunjungan = Kunjungan::where('emp_number','LIKE', '%'.$kunjungan.'%')->get();
        // $emp_number = Customer::where('emp_number','LIKE', '%'.$emp_number.'%')->sortBy('id','DESC')->get();

        return response()->json($kunjungan);
    }

    public function store(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'nama' => 'required|string|max:255',
            'emp_number' => 'required|string|max:255',
            'tujuan_value' => 'string',
            'kunjungan_value' => 'string',
            'tanggal_tujuan' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'nullable',
            'catatan' => 'nullable'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $validator = $validator->validate();
        $validator['jam_mulai'] = str_replace(')', '', str_replace('(', '', str_replace('TimeOfDay', '', $request->jam_mulai)));
        $validator['jam_selesai'] = str_replace(')', '', str_replace('(', '', str_replace('TimeOfDay', '', $request->jam_selesai)));
        $tujuan = Kunjungan::create([
            'nama' => $request->nama,
            'emp_number' => $request->emp_number,
            'tujuan_value' =>$request->tujuan_value,
            'kunjungan_value' =>$request->kunjungan_value,
            'tanggal_tujuan' => $request->tanggal_tujuan,
            'jam_mulai' => $validator['jam_mulai'],
            'jam_selesai' => $validator['jam_selesai'],
            'catatan' => $request->catatan,
         ]);

        // $kunjungan = Kunjungan::create($request->all());

        return response()->json($tujuan);


        // return response()->json(['plan created successfully.', new KunjunganResource($tujuan)]);
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
    }
}
