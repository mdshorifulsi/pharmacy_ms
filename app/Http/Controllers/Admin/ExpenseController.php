<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use DB;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $date=date('d-m-Y');
        $expense=DB::table('expenses')->where('expense_date',$date)->orderBy('id','DESC')->get();
        return response()->json($expense);
    }


     public function allexpense()
    {
        $expense=DB::table('expenses')->orderBy('id','DESC')->get();
        return response()->json($expense);
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
         $expense= new Expense;
        $expense->details=$request->details;
        $expense->Amount=$request->Amount;
        $expense->expense_date=date('d-m-Y');
        

        $expense->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense=DB::table('expenses')->where('id',$id)->first();
        return response()->json($expense);
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
        $expense=Expense::find($id);
        $expense->details=$request->details;
        $expense->Amount=$request->Amount;
        $expense->expense_date=date('d-m-Y');
        

        $expense->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense=Expense::find($id);
        $expense->delete();
    }
}
