<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
    public function GetProduct($id){

        $product=DB::table('products')
        ->where('category_id',$id)
        ->get();

        return response()->json($product);

    }


    public function todaysell(){

         $date=date('d-m-Y');
        $todaysell=DB::table('orders')->where('order_date',$date)->sum('total');

        return response()->json($todaysell);
    }


    public function todayincome(){

         $date=date('d-m-Y');
        $todayincome=DB::table('orders')->where('order_date',$date)->sum('pay');

        return response()->json($todayincome);
    }

       public function todaydue(){

         $date=date('d-m-Y');
        $todaydue=DB::table('orders')->where('order_date',$date)->sum('due');

        return response()->json($todaydue);
    }


       public function todayexpense(){

         $date=date('d-m-Y');
        $todayexpense=DB::table('expenses')->where('expense_date',$date)->sum('Amount');

        return response()->json($todayexpense);
    }
}
