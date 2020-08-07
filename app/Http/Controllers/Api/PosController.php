<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Order;
use App\Model\Pos;
use App\Model\Product;
use App\Model\OrderDetail;
use App\Model\Expense;
use DateTime;
use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ret
     * urn \Illuminate\Http\Response
     */
    public function CategoryProduct($id){
        $products = Product::where('category_id', $id)->get();
        return response()->json($products);
    }

    public function order(Request $request){

        $validatedData = $request->validate([
            'customer_id' => 'required',
            'payby' => 'required',
        ]);

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['qty'] = $request->qty;
        $data['sub_total'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['payby'] = $request->payby;
        $data['order_date'] = date('d/m/Y');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');
        // $order_id = DB::table('orders')->insertGetId($data); // insertGetId get last id of the data in the table
        $order_id = Order::insertGetId($data); // insertGetId get last id of the data in the table

        $contents = Pos::all();

        $order_data = array();
        foreach ($contents as $content) {
            $order_data['order_id'] = $order_id;
            $order_data['product_id'] = $content->product_id;
            $order_data['product_quantity'] = $content->product_quantity;
            $order_data['product_price'] = $content->product_price;
            $order_data['sub_total'] = $content->sub_total;

            OrderDetail::create($order_data);

            Product::where('id',$content->product_id)
                ->update(['product_quantity',  DB::raw('product_quantity -' .$content->product_quantity)]);

        }

        DB::table('pos')->delete();
        return response('Done');
    }


    public function SearchOrderDate(Request $request){
        $orderdate = $request->date;

        $newdate = new DateTime($orderdate);
        $done = $newdate->format('d/m/Y');

        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('orders.order_date',$done)
            ->get();

        return response()->json($order);

      }


    public function TodaySell(){
        $date = date('d/m/Y');
        $sell = Order::where('order_date',$date)->sum('total');
        return response()->json($sell);
    }

    public function TodayIncome(){
        $date = date('d/m/Y');
        $income = Order::where('order_date',$date)->sum('pay');
        return response()->json($income);
    }


    public function TodayDue(){
        $date = date('d/m/Y');
        $todaydue = Order::where('order_date',$date)->sum('due');
        return response()->json($todaydue);
      }


      public function TodayExpense(){
        $date = date('d/m/Y');
        $expense = Expense::where('expense_date',$date)->sum('amount');
        return response()->json($expense);
      }

    public function Stockout(){

        $product = Product::where('product_quantity','<','1')->get();
        return response()->json($product);

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
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Pos $pos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pos $pos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pos $pos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pos $pos)
    {
        //
    }
}
