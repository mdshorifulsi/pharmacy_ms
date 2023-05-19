<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Image;
use DB;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier=Supplier::all();
        return response()->json($supplier);
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
          if($request->photo){

            $position=strpos($request->photo, ';');
            $sub=substr($request->photo,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $uploade_path="images/supplier/";
            $images_url=$uploade_path.$name;
            $img->save($images_url);

           $supplier= new Supplier;

            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->photo=$images_url;
            $supplier->address=$request->address;
            $supplier->phone_number=$request->phone_number;
            $supplier->job_title=$request->job_title;
            $supplier->salary=$request->salary;
            $supplier->join_date=$request->join_date;

            $supplier->save();
        }else{

            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->address=$request->address;
            $supplier->phone_number=$request->phone_number;
            $supplier->job_title=$request->job_title;
            $supplier->salary=$request->salary;
            $supplier->join_date=$request->join_date;
            $supplier->save();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=DB::table('suppliers')->where('id',$id)->first();
        return response()->json($supplier);
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
         $supplier=Supplier::find($id);
          if($request->photo){

            $position=strpos($request->photo, ';');
            $sub=substr($request->photo,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $uploade_path="images/supplier/";
            $images_url=$uploade_path.$name;
            $img->save($images_url);

       

            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->photo=$images_url;
            $supplier->address=$request->address;
            $supplier->phone_number=$request->phone_number;
            $supplier->job_title=$request->job_title;
            $supplier->salary=$request->salary;
            $supplier->join_date=$request->join_date;

            $supplier->save();
        }else{

            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->address=$request->address;
            $supplier->phone_number=$request->phone_number;
            $supplier->job_title=$request->job_title;
            $supplier->salary=$request->salary;
            $supplier->join_date=$request->join_date;
            $supplier->save();

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);
        $supplier->delete();
    }
}
