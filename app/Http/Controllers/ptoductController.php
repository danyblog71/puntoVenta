<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Product;

class ptoductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        //$products = Product::all();
        $products = Product::join('branches', 'id_branch', '=', 'branches.id')
        ->select('products.id','products.code','products.name','products.price','products.quantity','products.type_quantity','branches.name as branch')
        ->get();
        //dd($products);
        return view('product', compact('branches','products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product =  new product;
        $product->code = $request->get('code');
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->type_quantity = $request->get('typeQuantity');
        $product->id_branch = $request->get('idBranch');

        $product->save();
        return redirect('/');
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
}
