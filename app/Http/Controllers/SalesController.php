<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sales;

class SalesController extends Controller
{
    public function add(){

        $products = Product::get();
        $customers = Customer::get();

        return view('add-sales',compact('products','customers'));

    }

    public function added(Request $request) {
        $count = Sales::count();
        $sales = new Sales();
        $sales->invoice_number = 'INV00-' . ($count+1);
        $sales->item = $request->product;
        $sales->quantity = $request->quantity;
        $sales->customer_id = $request->customer;
        $sales->save();
        return redirect('sales-list')->with('success','sales added successfully');
          
    }

    public function list(Request $request) {

        $sales_table = (new Sales())->getTable();
        $customer_table = (new Customer())->getTable();
        $product_table = (new Product())->getTable();
        $sales = Sales::select( $sales_table.'.id', $sales_table.'.invoice_number', $sales_table.'.item', 
        $sales_table.'.quantity', $sales_table.'.customer_id',$customer_table.'.name as customer_name',$product_table.'.product_name',$product_table.'.price')
                     ->join($customer_table, $customer_table.'.id', $sales_table.'.customer_id')
                     ->join($product_table, $product_table.'.id', $sales_table.'.item')
                     ->orderBy($sales_table.'.id', 'ASC')
                     ->get();             

        return view('sales-list',compact('sales'));
          
    }

    public function sales_report(Request $request) {
        $sales_data = "";
        $products = Product::get();
        $customers = Customer::get();
        $sales = Sales::get();
        $old_values = ['sales_quandity' => $request->sales_quandity,'c_name_or_email' => $request->c_name_or_email];

        return view('sales-report',compact('products','customers','sales','sales_data','old_values'));
         
    }

    public function sales_report_result(Request $request) {
        
        $sales_table = (new Sales())->getTable();
        $customer_table = (new Customer())->getTable();
        $product_table = (new Product())->getTable();

        $sales_count = $request->sales_quandity;

        $customer_name_or_email = $request->c_name_or_email;

        $old_values = ['sales_quandity' => $request->sales_quandity,'c_name_or_email' => $request->c_name_or_email];

        $sales_data = Sales::select($customer_table.'.name', $customer_table.'.email',$customer_table.'.dob',$sales_table.'.quantity',
        $product_table.'.product_name',$product_table.'.price')
        ->join($customer_table, $customer_table.'.id', $sales_table.'.customer_id')
        ->join($product_table, $product_table.'.id', $sales_table.'.item');
        if(isset($request->sales_quandity)) {
            
            $sales_data = $sales_data->where($sales_table.'.quantity',$sales_count);    
         }

         if(isset($request->c_name_or_email)) {
            
            $sales_data = $sales_data->where($customer_table.'.name',$customer_name_or_email)
                            ->orWhere($customer_table.'.email',$customer_name_or_email) ;    
         }
         $sales_data = $sales_data->get();
      
        return view('sales-report',compact('sales_data','old_values'));
        
    }
}
