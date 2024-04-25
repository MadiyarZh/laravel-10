<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products', ['data' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        Product::create($request->all());
        
        // return view('products', ['data' => Product::all()])->with('success', 'Product is added successfully!!!');
        return redirect()->route('products')->with('success', 'Product is added successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = new Product;
        return view('product-detail', ['data' =>  $product::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        // $product = Product::findOrFail($id);
        // $product->update($request->all());
        // return $product;

        $product = new Product;
        return view('update-product', ['data' => $product->findOrFail($id)]);
    }

    public function updateSubmit(Request $request, string $id)
    {
        // $product = Product::find($id);
        // $product->name = $request->input('name');
        // $product->price = $request->input('price');

        // $product->save();
        $product = Product::findOrFail($id);
        $product->update($request->all());
        // return $product;
        return redirect()->route('product-detail', $id)->with('success', 'Product is updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products')->with('success', 'Product is deleted successfully!!!');
    }

    public function getByBrand($name)
    {
        $product = new Product;

        $minPriceProduct = $product->where('name', '=', $name)->orderBy('price', 'asc')->first();
        $maxPriceProduct = $product->where('name', '=', $name)->orderBy('price', 'desc')->first();

        $data = [ 
            'min' => $minPriceProduct,
            'max' => $maxPriceProduct
        ];

        return view('products', ['data' => $data]);
    }
}
