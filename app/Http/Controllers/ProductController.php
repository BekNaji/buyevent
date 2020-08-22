<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * This method pulls all products in the Product table and sends them to the view.
     * @return view()
     */
    public function list()
    {
    	$products = Product::all();
    	return view('product.list',compact('products'));
    }

    /**
     * This method calls a form file to create the products.
     * @return view()
     */
    public function create()
    {
    	
    	return view('product.create');
    }

    /**
     * This method calls the edit form and pulls the data from the products table according to the incoming   id number.
     * 
     * @param  array
     * @return view()
     */
    public function edit(Request $request)
    {
    	$product = Product::find(decrypt($request->id));
    	return view('product.edit',compact('product'));

    }

    /**
     * This method saves the data from the product creation form in the products table.
     * @param  arary
     * @return redirect
     */
    public function store(Request $request)
    {
    	$product = new Product();
    	$product->name = $request->name;
    	$product->desc = $request->desc;
    	$product->price = $request->price;
    	$product->count = $request->count;
    	$product->save();
    	return redirect()->route('product.index')->with(['success'=>'Item Created!']);

    }

    /**
     * This method updates the data from the product edit form according to the id number.
     * @param  array
     * @return [type]
     */
    public function update(Request $request)
    {
    	$product = Product::find(decrypt($request->id));
    	$product->name = $request->name;
    	$product->desc = $request->desc;
    	$product->price = $request->price;
    	$product->count = $request->count;
    	$product->save();
    	return redirect()->route('product.index')->with(['success'=>'Item Updated!']);
    }

    /**
     * This method deletes the data from the products table according to the incoming id number.
     * @param  array
     * @return redirect
     */
    public function delete(Request $request)
    {
    	$product = Product::find(decrypt($request->id));
    	if($product->delete())
    	{
    		return back()->with(['success'=>'Item Deleted!']);
    	}else
    	{
    		return back()->with(['warning'=>'Item Could not Delete!']);
    	}
    }
}
