<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Product;
use Image;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
       $product=DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->join('suppliers','products.supplier_id','suppliers.id')
            ->select('categories.cat_name','brands.brand_name','suppliers.name','products.*')
            ->get();
        return response()->json($product);
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
         $image=$request->image;
            $position=strpos($request->image, ';');
            $sub=substr($request->image,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->image)->resize(240,200);
            $upload_path="images/product/";
         
            $images_url = $upload_path.'/'.$name;
            $img->save($images_url);

          
         $product= new Product;
            $product->category_id =$request->category_id ;
            $product->brand_id =$request->brand_id ;
            $product->supplier_id =$request->supplier_id ;
            $product->product_name=$request->product_name;
            $product->product_generic_name=$request->product_generic_name;
            $product->unit_power=$request->unit_power;
            $product->product_code=$request->product_code;
            $product->buying_price=$request->buying_price;
            $product->selling_price=$request->selling_price;
            $product->description=$request->description;
            $product->stock_quantity=$request->stock_quantity;
            $product->status=$request->status;
            $product->image=$images_url;
            $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
         return response()->json($product);
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

        $product=Product::find($id);
        $image=$request->image;
            $position=strpos($request->image, ';');
            $sub=substr($request->image,0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().'.'.$ext;
            $img = Image::make($request->image)->resize(240,200);
            $upload_path="images/product/";
         
            $images_url = $upload_path.'/'.$name;
            $img->save($images_url);

          
         
            $product->category_id =$request->category_id ;
            $product->brand_id =$request->brand_id ;
            $product->supplier_id =$request->supplier_id ;
            $product->product_name=$request->product_name;
            $product->product_generic_name=$request->product_generic_name;
            $product->unit_power=$request->unit_power;
            $product->product_code=$request->product_code;
            $product->buying_price=$request->buying_price;
            $product->selling_price=$request->selling_price;
            $product->description=$request->description;
            $product->stock_quantity=$request->stock_quantity;
            $product->status=$request->status;
            $product->image=$images_url;
            $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
    }
}
