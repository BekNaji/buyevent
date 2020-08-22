<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

/*
* This class control cart features
* 
*/

class CartController extends Controller
{
   
    /**
     * This method calls some properties automatically
     *  @return $next()
     */
    public function __construct()
    {
        $this->middleware(function($request,$next)
        {
            $this->cartCount();

            $this->totalPrice();
            return $next($request);
        });
        
    }


    /**
     * This method checks the layout and data on the cart page.
     *
     *  @return view()
     */
    public function index()
    {
        $orders = session('cart');

        $this->totalPrice();

    	return view('cart.index',compact('orders'));
    }

    /**
     * This method takes the ID number of the products to be added to the card and keeps the necessary information in sesion.
     * @param array
     * @return back() with respond
     */
    public function add(Request $request)
    {
        $orders = session('cart');

        $id = decrypt($request->id);

        $product = Product::find($id);
        
        $session['id'] = $product->id;
        $session['name'] = $product->name;
        $session['desc'] = $product->desc;
        $session['price'] = $product->price;
        $session['count'] = 1;

       
        Session::push('cart',$session);
       
        // Calculates how many products are on the card
        $this->cartCount();

        // Calculate how much money is in total
        $this->totalPrice();

        return back();
        
    }

     /*
        Deletes the product information in the session according to the incoming id number.

        @return back()
    */
    public function delete(Request $request)
    {

       $orders = session('cart');

        $id = decrypt($request->id);

        unset($orders[$id]);

        $sessions = array_values($orders);

        Session::put('cart',$sessions);

        $this->totalPrice();
        
        return back();

    }

     /*
        Cleans the card

        @return back()
    */
    public function cleanCart()
    {
        Session::forget('cart');
        return back();
    }
    /*

     Calculates how many products are on the card and creates a Session

    */
    public function cartCount($value='')
    {
        $orders = Session::get('cart');
        
        if($orders != '' || $orders != null)
        {
            Session::put('cart_count',count($orders));
        }else
        {
            Session::put('cart_count','0'); 
        }
    }

    /*

     Calculates the total price of the product and creates a session

    */
    public function totalPrice()
    {
        $totalPrice = 0;

        $orders = session('cart');

        if($orders != ''){
            foreach ($orders as $key => $order) 
            {
                $totalPrice += $order['price'];
            }
        }

        Session::put('totalPrice',$totalPrice);
    }

   

    

    

   
}
