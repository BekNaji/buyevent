<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * This method redirects the customer to the required page if the customer has paid, or to the 404 page if customer has not paid.
     * @return view()
     */
    public function paycheck()
    {
    	if(Session::get('customer_id') =='')
    	{
    		abort('404');
    	}
    	$customer = Customer::find(Session('customer_id'));

    	$orders = session('cart');

    	return view('order.paycheck',compact('orders','customer'));
    }

    /**
     * This method allows to send information about the order by mail.
     * @return redirect
     */
    public function sendInvoice()
    {
    	if(Session::get('customer_id') =='')
    	{
    		abort('404');
    	}
    	$customer = Customer::find(Session('customer_id'));

    	$orders = session('cart');

    	$totalPrice = Session('totalPrice');



        /**
         * After making the settings in the .env file, you can activate the following code.
         */
        
    	// $mail = \Mail::to($customer->email)
    	// 		->send(new SendInvoice($totalPrice,$customer,$orders));
    	// echo "Mail Sent";

        $mail = true;

        if(!$mail)
        {
            Session::put('respond','ok');
            return redirect()->route('cart.unsuccess');
        }

        Session::forget('cart');  // forget cart session
        Session::forget('customer_id'); // forget customer
        Session::forget('totalPrice'); // foget total price
        Session::forget('cart_count'); // forget cart count
        Session::put('respond','ok'); // respond ok

        return redirect()->route('cart.success');
    }

    /**
     * This method will be shown if the payment is unsuccessful.
     * @return view()
     */
    public function unsuccess()
    {   
        if(Session::get('respond') != 'ok')
        {
            abort(404);
        }
        return view('order.unsuccess');
    }

    /**
     * This method will be shown if the payment is successful.
     * @return view()
     */
    public function success()
    {
        if(Session::get('respond') != 'ok')
        {
            abort(404);
        }
        
        return view('order.success');
    }


    




}
