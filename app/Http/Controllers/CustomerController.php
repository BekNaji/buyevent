<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
	/**
     * If the customer created the record, redirect it to the payment page
     * Calls the customer information save form if customer has not registered the customer
     * @return view() or redirect()
     */
    public function create()
    {
    	if(Session::get('customer_id') != '')
    	{
    		return redirect()->route('order.paycheck');
    	}
    	return view('customer.create');
    }

    /**
     * Records the information from the customer form to the customers table
     * @param  array
     * @return redirect()
     */
    public function store(Request $request)
    {
    	$validation = $request->validate([
    		'name' =>'required|max:255',
    		'email' =>'required|max:255|email',
    		'phone' =>'required|max:12'
    	]);

    	$customer 			= new Customer();
    	$customer->name 	= $request->name;
    	$customer->email 	= $request->email;
    	$customer->phone 	= $request->phone;
    	$customer->save();

    	Session::put('customer_id',$customer->id);

    	return redirect()->route('order.paycheck');

    }

    /**
     * Updates the information from the customer form to the customers table
     * @param  array
     * @return redirect()
     */
    public function update(Request $request)
    {
        /**
         * Validation
         */
        $validation = $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|max:255|email',
            'phone' =>'required|max:13'
        ]);

        /**
         * update function
         * @var [type]
         */
        $customer           = Customer::find(Session::get('customer_id'));
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->phone    = $request->phone;
        $customer->save();

        return redirect()->route('order.paycheck');

    }

    /**
     * It takes the customer id number that is present in the session and pulls the customers according to the id number in the table.
     * @return view()
     */
    public function edit()
    {
        if(Session::get('customer_id') =='')
        {
            abort('404');
        }
        $customer = Customer::find(Session::get('customer_id'));

        return view('customer.edit',compact('customer'));
    }
}
