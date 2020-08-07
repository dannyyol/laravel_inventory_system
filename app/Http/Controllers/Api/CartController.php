<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Pos;
use Illuminate\Http\Request;
use App\Model\Vat;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart(Request $request, $id){
        $product = Product::where('id', $id)->first();

        $check_if_provided_is_added_cart = Pos::where('product_id', $id)->first();
        if($check_if_provided_is_added_cart){
            $data = Pos::where('product_id', $id)->increment('product_quantity');
            $product = Pos::where('product_id',$id)->first();
            $subtotal = $product->product_quantity * $product->product_price;
            Pos::where('product_id',$id)->update(['sub_total'=> $subtotal]);
        }else{
            $data = [];
            $data['product_id'] = $id;
            $data['product_name'] = $product->product_name;
            $data['product_quantity'] = 1;
            $data['product_price'] = $product->selling_price;
            $data['sub_total'] = $product->selling_price;
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
            Pos::insert($data);

        }
        
        return response()->json($data);
        
    }

    public function CartProduct(){
        $cart = Pos::all();
        return response()->json($cart);
    }


    public function increment($id){
        $quantity = Pos::where('id',$id)->increment('product_quantity');
  
        $product = Pos::where('id',$id)->first();
        $subtotal = $product->product_quantity * $product->product_price;
        Pos::where('id',$id)->update(['sub_total'=> $subtotal]);
        return response('Done');
    }

    public function decrement($id){  
        $product = Pos::where('id',$id)->first();
        if($product->product_quantity >= 2){
            $quantity = Pos::where('id',$id)->decrement('product_quantity');
            $subtotal = $product->product_quantity * $product->product_price;
            Pos::where('id',$id)->update(['sub_total'=> $subtotal]);
            return response('Done');
        }else{
            return response('Can not be added');

        }
    }

    public function vat(){
        $vat = Vat::first();
        return response()->json($vat);
    }

    public function index()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCart($id){
        Pos::where('id',$id)->delete();
        return response('Done');
   
    }
}
