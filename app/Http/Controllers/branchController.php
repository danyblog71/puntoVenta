<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class branchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branch', compact('branches'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch =  new Branch;
        $branch->name = $request->get('name');
        $branch->save();    
        return redirect('/branch');
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
        $branch = Branch::where('id', '=', $id)->get();
        $branch[0]->name = $request->get('name');
        $branch[0]->save();
        return redirect('/branch');
    }

    public function edit($id)
    {
        $getBranch = Branch::where('id', '=', $id)->get();
        $branch = $getBranch[0];
        //dd($branch);
        return view('edit_branch', compact('branch'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect('/branch');
    }
}
