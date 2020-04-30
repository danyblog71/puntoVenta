<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SoldProduct;
use App\Product;

class salesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $x=0;
        $total = $request->get('total');
        $sale = new Sale;
        $sale->total = $total;
        $sale->user = "mostrador";
        $sale->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = Sale::all()->last();
        $idSale = $sale->id;
        $id = $request->get('id');
        $quantity = $request->get('cantidad');
        $importe = $request->get('importe');
        $sold = new SoldProduct;
        $sold->id_sale = $idSale;
        $sold->id_product = $id;
        $sold->quantity = $quantity;
        $sold->importe = $importe;
        $sold->save();


        $product = Product::find($id);
        $x = $product->quantity - $request->get('cantidad');
        $product->quantity = $x;
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
    public function destroy($id)
    {
        //
    }

    public function setTicket(){
        $sale = Sale::all()->last();
        $productSould = SoldProduct::where("id_sale", "=", $sale->id)->get();
        $productsData = [];
        foreach ($productSould as $key) {
            $product = Product::where('id', '=', $key->id_product)->get();
            //dd($product[0]->name);
            $productData[] = ['name' => $product[0]->name, 'precio' => $product[0]->price, 'cant' => $key->quantity, 'import' =>$key->importe];
        }
        json_encode($productData);
        $total = $sale->total;
        return view('ticket', compact('productData', 'total'));
    }
}
