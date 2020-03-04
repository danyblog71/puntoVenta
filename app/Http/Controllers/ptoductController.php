<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Product;

class ptoductController extends Controller
{
    public function getProduct(Request $request){
        $product = Product::where('code', '=', $request->get('code'))->get();
        $z = $request->get('cantidad');
        if ($z <= $product[0]->quantity) {
            $x = $product[0]->quantity - $request->get('cantidad');
            return json_encode($product[0]); 
        } else {
            return 0;
        }        
              
    }

    public function sales(){
        return view('sales_register');
    }
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
        $product = Product::where('id', '=', $id)->get();
        $product[0]->code = $request->get('code');
        $product[0]->name = $request->get('name');
        $product[0]->price = $request->get('price');
        $product[0]->quantity = $request->get('quantity');
        $product[0]->type_quantity = $request->get('typeQuantity');
        $product[0]->id_branch = $request->get('idBranch');

        $product[0]->save();
        return redirect('/');
    }

    public function edit($id){
        $getProduct = Product::where('id', '=', $id)->get();
        $product = $getProduct[0];
        $branches = Branch::all();
        //dd($branch);
        return view('edit_product', compact('product', 'branches'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
