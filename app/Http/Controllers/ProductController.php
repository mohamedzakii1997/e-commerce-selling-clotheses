<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('auth:web')->only('getImage');
        
       
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.product.products',compact('products'));

    }

    public function getImage($id){
        $product=Product::findOrFail($id);
        return Storage::get($product->image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    
        $this->validate($request, [
            'name'=>'required',
        'price'=>'required',
        'desc'=>'required',
        'image'=>'required|image',
       
        ]);

        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('desc');
        if($request->has('image')){
            $product->image = $request->file('image')->store('images\products');

        }
      

       
        $product->save();
        return redirect('/products')->with('sucsess','Product Created');
       
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
    {   $product=Product::findOrFail($id);
        return view('admin.product.edit',compact('product'));
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
        $this->validate($request, [
            'name'=>'required',
        'price'=>'required',
        'desc'=>'required',
        'image'=>'nullable|image',
       
        ]);
        $product=Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('desc');
        if($request->has('image')){
            Storage::delete($product->image);
            $product->image = $request->file('image')->store('images\products');

        }
      

       
        $product->save();
        return redirect('/products')->with('sucsess','Product Edited');
       


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect('/products')->with('sucsess','Product Deleted');

   }



}
