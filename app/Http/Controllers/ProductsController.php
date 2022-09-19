<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sections;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Sections::all();
        $products = Products::all();
        return view('products.index', compact('products', 'sections'));
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
        Products::create([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $request->section_id,
        ]);
        Alert::success('Product created successfully', 'Success');
        return redirect( route('Products.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $product = Products::find($request->id);
        $product->update([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $request->section_id,
        ]);
        Alert::success('Product updated successfully', 'Success');
        return redirect( route('Products.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Products::find($request->id);
        $product->delete();
        Alert::success('Product deleted successfully', 'Success');
        return redirect( route('Products.index') );
    }
}
