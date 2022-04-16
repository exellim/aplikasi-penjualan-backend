<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;
// use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    // Show all Customer names
    // Auth::user()->id
    public function index()
    {
        $customer = Customer::orderBy('id', 'DESC')->get();
        return response()->json($customer);
    }

    // Show all Customer names
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return response()->json(['message' => 'success','data' => $customer]);
    }

    public function search($emp_number)
    {
        $emp_number = Customer::where('emp_number','LIKE', '%'.$emp_number.'%')->sortBy('id','DESC')->get();
        return response()->json(['message' => 'Connected','data'=>$emp_number]);
    }
}
