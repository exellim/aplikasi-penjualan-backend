<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\NotaFaktur;
use Illuminate\Http\Request;

class NotaFakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nota = NotaFaktur::orderBy('id', 'desc')->paginate(10);
        $total = 0;

        foreach($nota as $key => $value) {
            $sub = str_replace('[', '', str_replace(']', '', $value->subtotal_harga));
            $ex = explode(',',$sub);
            $sum = array_sum($ex);
            $nota[$key]['subtotal_harga'] = $sum;
        }

        // dd($nota);
        return view('notafaktur.index',['nota' => $nota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customer = Customer::orderBy('nama', 'ASC')->get();
        $model = new NotaFaktur;
        return view('notafaktur.create', ['model'=>$model, 'customer'=>$customer]);

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
        $validator = validator()->make($request->all(),[
            'nama' => 'required|string|max:255',
            'nomor_telfon' => 'required|string',
            'nama_produk' => 'required|array',
            'qty_produk' => 'required|array',
            'harga_produk' => 'required|array',
            'subtotal_harga' => 'required|array',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $validator = $validator->validate();

        $nama_produk = '[';
        foreach ($request->nama_produk as $key=> $item){
            // dd($item);
            if((count($request->nama_produk) -1) == $key){
                $nama_produk .= '\''.$item.'\'';
            }else{
                $nama_produk .= '\''.$item.'\'' . ',';
            }
        }
        $nama_produk .= ']';

        $qty_produk = '[';
        foreach ($request->qty_produk as $key=> $item){
            // dd($item);
            if((count($request->qty_produk) -1) == $key){
                $qty_produk .= (int)$item;
            }else{
                $qty_produk .= (int)$item. ',';
            }
        }
        $qty_produk .= ']';

        $harga_produk = '[';
        foreach ($request->harga_produk as $key=> $item){
            // dd($item);
            if((count($request->harga_produk) -1) == $key){
                $harga_produk .= (int)$item;
            }else{
                $harga_produk .= (int)$item. ',';
            }
        }
        $harga_produk .= ']';

        $subtotal_harga = '[';
        foreach ($request->subtotal_harga as $key=> $item){
            // dd($item);
            if((count($request->subtotal_harga) -1) == $key){
                $subtotal_harga .= $item;
            }else{
                $subtotal_harga .= $item. ',';
            }
        }
        $subtotal_harga .= ']';
        $validator['subtotal_harga'] = $subtotal_harga;
        $validator['nama_produk'] = $nama_produk;
        $validator['qty_produk'] = $qty_produk;
        $validator['harga_produk'] = $harga_produk;
        if(($ambil = NotaFaktur::where('notaId', 'LIKE', '%' . $request->notaId . '%')->orderby('notaId', 'DESC')->first())){
            $string = substr($ambil->notaId,8);
            $nomerFak = $string + 1;
            $nomerFak = sprintf("%03d",$nomerFak);
        }
        else {
            $nomerFak = "001";
        }

        $nota = NotaFaktur::create([
            'notaId' => $request->notaId."-".$nomerFak,
            'nama' => $validator['nama'],
            'nomor_telfon' => $validator['nomor_telfon'],
            'nama_produk' => $validator['nama_produk'],
            'qty_produk' =>$validator['qty_produk'],
            'harga_produk' => $validator['harga_produk'],
            'subtotal_harga' => $validator['subtotal_harga'],
        ]);
        return redirect('nota');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->ajax()){
            $nota = Customer::where('id', $id)->select('handphone')->first();
            return $nota;
        }
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
        $customer = Customer::orderBy('nama', 'ASC')->get();
        $model = NotaFaktur::find($id);
        // dd(str_replace('[', '', str_replace(']', '', $model->qty_produk)));
        $model->setAttribute('nama_produk', explode(',', $model->NamaProdukArray));
        $model->setAttribute('qty_produk', explode(',', $model->QtyProdukArray));
        $model->setAttribute('harga_produk', explode(',', $model->HargaProdukArray));
        $model->setAttribute('subtotal_harga', explode(',', $model->SubtotalHargaArray));
        return view('notafaktur.edit', compact('model','customer'));
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
        $validator = validator()->make($request->all(),[
            'nama' => 'required|string|max:255',
            'nomor_telfon' => 'required|string',
            'nama_produk' => 'required|array',
            'qty_produk' => 'required|array',
            'harga_produk' => 'required|array',
            'subtotal_harga' => 'required|array',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $validator = $validator->validate();

        $nama_produk = '"[';
        foreach ($request->nama_produk as $key=> $item){
            // dd($item);
            if((count($request->nama_produk) -1) == $key){
                $nama_produk .= '\''.$item.'\'';
            }else{
                $nama_produk .= '\''.$item.'\'' . ',';
            }
        }
        $nama_produk .= ']"';

        $qty_produk = '"[';
        foreach ($request->qty_produk as $key=> $item){
            // dd($item);
            if((count($request->qty_produk) -1) == $key){
                $qty_produk .= (int)$item;
            }else{
                $qty_produk .= (int)$item. ',';
            }
        }
        $qty_produk .= ']"';

        $harga_produk = '"[';
        foreach ($request->harga_produk as $key=> $item){
            // dd($item);
            if((count($request->harga_produk) -1) == $key){
                $harga_produk .= (int)$item;
            }else{
                $harga_produk .= (int)$item. ',';
            }
        }
        $harga_produk .= ']"';

        $subtotal_harga = '"[';
        foreach ($request->subtotal_harga as $key=> $item){
            // dd($item);
            if((count($request->subtotal_harga) -1) == $key){
                $subtotal_harga .= $item;
            }else{
                $subtotal_harga .= $item. ',';
            }
        }
        $subtotal_harga .= ']"';
        $validator['subtotal_harga'] = $subtotal_harga;
        $validator['nama_produk'] = $nama_produk;
        $validator['qty_produk'] = $qty_produk;
        $validator['harga_produk'] = $harga_produk;
        if(NotaFaktur::where('id',$id)->update([
            'nama' => $validator['nama'],
            'nomor_telfon' => $validator['nomor_telfon'],
            'nama_produk' => $validator['nama_produk'],
            'qty_produk' =>$validator['qty_produk'],
            'harga_produk' => $validator['harga_produk'],
            'subtotal_harga' => $validator['subtotal_harga'],
            'status' => $request->status,
        ])){
            return redirect('nota')->with('success', 'Berhasil mengubah data');
        }
        return redirect('nota')->withErrors(['message'=> 'Gagal mengubah data']);
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
        if(NotaFaktur::where('id', $id)->delete()){
            return back()->with('success', 'Berhasil menghapus data');
        }
        return back()->withErrors(['message' => 'Gagal menghapus data']);
    }
}
