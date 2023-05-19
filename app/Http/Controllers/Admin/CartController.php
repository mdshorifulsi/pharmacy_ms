<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Cart;

class CartController extends Controller
{

    public function addtocard(Request $request,$id){

      
        $product=DB::table('products')->where('id',$id)->first();

        $check=DB::table('carts')->where('product_id',$id)->first();

        if($check){
            DB::table('carts')->where('product_id',$id)
            ->increment('product_quantity');


    $product=DB::table('carts')->where('product_id',$id)->first();

    $sub_total=$product->product_quantity*$product->product_price;
    DB::table('carts')->where('product_id',$id)->update(['sub_total'=>$sub_total]);



        }else{

            $data=array();
            $data['product_id']=$id;
            $data['product_name']=$product->product_name;
            $data['product_quantity']=1;
            $data['product_price']=$product->selling_price;
            $data['sub_total']=$product->selling_price;
            
            DB::table('carts')->insert($data);

        }

           
            return response()->json('done');

    }


    public function cartproduct(){

        $cart=DB::table('carts')->get();

        return response()->json($cart);

    }


    public function removeCart($id){

        $cart=Cart::find($id);
        $cart->delete();
    }


    public function increment($id){


    $quantity=DB::table('carts')->where('id',$id)
                ->increment('product_quantity');

    $product=DB::table('carts')->where('id',$id)->first();

    $sub_total=$product->product_quantity*$product->product_price;
    DB::table('carts')->where('id',$id)->update(['sub_total'=>$sub_total]);

    return response('done');

    }

    public function decrement($id){

         
    $quantity=DB::table('carts')->where('id',$id)
                ->decrement('product_quantity');

    $product=DB::table('carts')->where('id',$id)->first();

    $sub_total=$product->product_quantity*$product->product_price;
    DB::table('carts')->where('id',$id)->update(['sub_total'=>$sub_total]);

    return response('done');
    }


    public function vat(){

        $vat=DB::table('extras')->first();

        return response()->json($vat);

    }


}
