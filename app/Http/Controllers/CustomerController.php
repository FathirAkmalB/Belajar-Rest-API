<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers= Customer::paginate(10);
        return response()->json([
            'data' => $customers
        ]);
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'NIP' => $request->NIP,
            'dob' => $request->dob,
            'email' => $request->email
        ]);
        return response()->json([
            'data' => $customer
        ]);
    }


    public function show(Customer $customer)
    {
        
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->nama = $request->nama;
        $customer->jenis_kelamin = $request->jenis_kelamin;
        $customer->NIP = $request->NIP;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->save();

        return response()->json([
            'data' => $customer
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message' => 'customer deleted',
        ], 204);
    }
}
