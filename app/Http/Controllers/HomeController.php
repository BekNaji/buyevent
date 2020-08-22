<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class HomeController extends Controller
{
    /**
     * This method pulls all the data in the products table and sends it to the products html page.
     * @return view()
     */
    public function index()
    {
        $products = Product::all();
        return view('home',compact('products'));
    }


}
