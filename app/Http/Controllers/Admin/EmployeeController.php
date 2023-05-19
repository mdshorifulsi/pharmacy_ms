<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        return response()->json($employee);
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

            $photo=$request->photo;
            $position=strpos($request->photo, ';');
            $sub=substr($request->photo,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path="images/employee/";
         
            $images_url = $upload_path.'/'.$name;
            $img->save($images_url);

          
            $employee= new Employee;
            $employee->name=$request->name;
            $employee->email=$request->email;
            $employee->photo=$images_url;
            $employee->address=$request->address;
            $employee->phone_number=$request->phone_number;
            $employee->job_title=$request->job_title;
            $employee->salary=$request->salary;
            $employee->join_date=$request->join_date;

            $employee->save();
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=DB::table('employees')->where('id',$id)->first();
        return response()->json($employee);
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
         $employee=Employee::find($id);

         $photo=$request->photo;
            $position=strpos($request->photo, ';');
            $sub=substr($request->photo,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path="images/employee/";
         
            $images_url = $upload_path.'/'.$name;
            $img->save($images_url);

          
          
            $employee->name=$request->name;
            $employee->email=$request->email;
            $employee->photo=$images_url;
            $employee->address=$request->address;
            $employee->phone_number=$request->phone_number;
            $employee->job_title=$request->job_title;
            $employee->salary=$request->salary;
            $employee->join_date=$request->join_date;

            $employee->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id);
        $employee->delete();
    }
}
