<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function Createproduct() {
        $categories = Category::get();
       
        return view('add-product',compact('categories'));
    }

    public function Addproduct(Request $request){
        
        $this->validate($request,[
            'product_name'=>'required',
            'category'=>'required',
            'price'=>'required',],
            
            
            [
            'product_name.required'=>"Enter Product Name",
           
            'category.required'=>"Select Category",

            'price.required' => "Enter Price",
        
        ]);
           
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->save();

            return redirect('list_product')->with('success','Product added successfully');
        
    }

    public function Showproduct(){

        $product_table = (new Product())->getTable();
        $category_table = (new Category())->getTable();
        $products = Product::select( $product_table.'.id as product_id', $product_table.'.product_name', $product_table.'.category_id', $product_table.'.price', $category_table.'.name')
                     ->join($category_table, $category_table.'.id', $product_table.'.category_id')
                     ->orderBy($product_table.'.id','ASC')->get();             
        return view('product-show',compact('products'));

    }

    public function edit($id){
       
        $product_table = (new Product())->getTable();
        $category_table = (new Category())->getTable();

        $categories = Category::get();
        $product = Product::select( $product_table.'.id as product_id', $product_table.'.product_name', $product_table.'.category_id', $product_table.'.price', $category_table.'.name')
                    ->join($category_table, $category_table.'.id', $product_table.'.category_id')
                    ->where($product_table.'.id', $id)
                    ->first();     

        return view('product-edit',compact('product','categories'));
      }
    
    public function update(Request $request,$id){

        $this->validate($request,[
            'product_name'=>'required',
            'category'=>'required',
            'price'=>'required',],
            
            
            [
            'product_name.required'=>"Enter Product Name",
           
            'category.required'=>"Select Category",

            'price.required' => "Enter Price",
        
        ]);


            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->save();

            return redirect('list_product')->with('success','Product updated successfully');

    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('list_product')->with('success','Product deleted successfully');
    }

}
