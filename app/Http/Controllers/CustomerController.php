<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->search;
        if(request()->ajax()){ //apakah request dari ajax
            $customer = Customer::when($search != null, function($q) use($search) {
                $q->where('nama','LIKE','%'.$search.'%');
            })->orderBy('id', 'desc')->paginate(10);
            return $customer;
            return view('customer.datatable-list-customer', compact('customer','search'));
        }
        $customer = Customer::orderBy('id', 'desc')->paginate(10);
        return view('customer.index',['customer' => $customer, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Customer;
        return view('customer.create', compact('model')); // localhost/customer
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Customer;
        $model->nama = $request->nama;
        $model->alamat_rumah = $request->alamat_rumah;
        $model->handphone = $request->handphone;
        $model->save();

        return redirect('customer');
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
        $model = Customer::find($id);
        return view('customer.details', compact('model'));
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
        $model = Customer::find($id);
        return view('customer.edit', compact('model'));
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
        $model = Customer::find($id);
        $model->nama = $request->nama;
        $model->alamat_rumah = $request->alamat_rumah;
        $model->handphone = $request->handphone;
        $model->save();

        return redirect('customer');
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
        $model = Customer::find($id);
        $model->delete();
        return redirect('customer');
    }
}
