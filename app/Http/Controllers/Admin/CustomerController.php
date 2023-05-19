<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $customer=Customer::all();
        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'customer_name' => 'required|max:200',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

          $customer= new Customer;

            $customer->customer_name=$request->customer_name;
            $customer->email=$request->email;
            $customer->address=$request->address;
            $customer->phone_number=$request->phone_number;
            $customer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $customer=Customer::find($id);
        // return response()->json($customer);

         $customer=DB::table('customers')->where('id',$id)->first();
        return response()->json($customer);
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
            $customer=Customer::find($id);
            $customer->customer_name=$request->customer_name;
            $customer->email=$request->email;
            $customer->address=$request->address;
            $customer->phone_number=$request->phone_number;
            $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->delete();

    }
}
