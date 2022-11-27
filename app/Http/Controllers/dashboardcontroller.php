<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dashboardcontroller extends Controller
{
    function receipt(Request $req)
    {

        $list = $req->all();

        

        $customer = DB::table('customers')->where('customer_id', $req->hdcustomer_id)->first();

        if (!$customer) {
            return back()->with('nocustomer', 'No customer exists, please check the customer ID again');
        }
        $changecheck =  $req->amount_paid - $req->hdtotalamount;

        if ($changecheck < 0) {
            return back()->with('amountpaiderror', 'Insufficient amount, please try again.');
        }


        $firstname = $customer->first_name;
        $lastname = $customer->last_name;
        $latest = DB::table('orders')->orderBy('order_id', 'desc')->first();

        $quantity = session('quantityarray');
        $listcheckout = session('items');
        $price = $list = ['price'];
        $pricecount = 0;
        $sum = 0;


        $product_idcount = 0;
        $count = 0;


        DB::table('orders')->insert([
            'customer_id' => $req->hdcustomer_id,
            'order_date' => date("Y/m/d"),
            'branch_id' => session('branch_id'),
            'staff_id' => session('staff_id')
        ]);


        foreach ($listcheckout as $items) {
            $product = DB::table('product')->where('product_id', $items)->first();
        
            if ($product->quantity <=0) {
                return back()->with('StockEmpty'," the $product->product_name is out of Stock, please inform the admin regarding this issue");
            }


            DB::table('order_items')->insert([
                'order_id' => $req->hdorder_id,
                'product_id' => $items,
                'quantity' => $quantity[$count]
            ]);
            $newval = $product->quantity-$quantity[$count];
            DB::table('product')
                ->where('product_id', $items)
                ->update(['quantity' => $newval]);
        
        
            }


        $count++;

        DB::table('invoice')->insert([
            'customer_id' => $req->hdcustomer_id,
            'order_id' => $req->hdorder_id,
            'total_amount' => session('total_amount'),
            'date_recorded' => date("Y/m/d")
        ]);



        DB::table('receipt')->insert([

            'order_id' => $req->hdorder_id,
            'date_generated' => date("Y/m/d"),
            'first_name' => "$customer->first_name",
            'last_name' => "$customer->last_name",
            'amount_paid' => $req->amount_paid,
            'amount_change' => $req->amount_paid - $req->hdtotalamount

        ]);


        Session::forget('quantityarray');
        Session::forget('items');
        Session::forget('customer_id');
        Session::forget('quantity');
        Session::forget('order_id');
        Session::forget('total_amount');
        return back()->with('orderDone', "Order Successfully placed to $firstname " . $lastname);
    }




    // ==============================
    function checkout(Request $req)
    {


        $customer = DB::table('customers')->where('customer_id', $req->customer_id)->first();

        if (!$customer) {
            return back()->with('nocustomer', 'No customer exists, please check the customer ID again');
        }

        $latest = DB::table('orders')->orderBy('order_id', 'desc')->first();
        $list = $req->all();
        $quantity = $list['quantity'];
        $listcheckout = $list['checkout'];
        $price = $list = ['price'];
        $pricecount = 0;
        $sum = 0;
        $req->session()->put('list', $list);
        foreach ($req->pricecount as $keyspot) {
            $sum += $keyspot * $quantity[$pricecount];
            $pricecount++;
        }
        $returncounter = $latest->order_id + 1;
        $req->session()->put('quantityarray', $quantity);
        $req->session()->put('items', $listcheckout);
        $req->session()->put('customer_id', $req->customer_id);
        $req->session()->put('quantity', count($quantity));
        $req->session()->put('order_id', $returncounter);
        $req->session()->put('total_amount', $sum);

        return back()->with('notify', "Overall price for Order ID : $returncounter  is $sum");
        if ($quantity == null || $listcheckout == null || (count($quantity) != count($listcheckout))) {
            if ($quantity == null) {
                return back()->with('quantitynull', 'Please specify the values of the quantity');
            }
            if ($listcheckout == null) {
                return back()->with('checkoutnull', 'please select which product to checkout');
            }
        }

        $count = 0;
        $key = session('branch_id');

        DB::table('orders')->insert([
            'customer_id' => $req->customer_id,
            'order_date' => date("Y/m/d"),
            'branch_id' => session('branch_id'),
            'staff_id' => session('staff_id')
        ]);

        foreach ($listcheckout as $items) {
            DB::table('order_items')->insert([
                'order_id' => $latest->order_id + 1,
                'product_id' => $items,
                'quantity' => $quantity[$count]
            ]);
            $count++;
        }
        $returncounter = $latest->order_id + 1;
        return back()->with('notify', "Overall price for Order ID : $returncounter  is $sum");
    }
}
