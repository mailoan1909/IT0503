<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('client.pages.homepage', compact("products"));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
     $products = Product::where('name','like','%'.$keyword.'%')->get();

     return view('client.pages.search',compact('products'));

    }
    public function detail($id)
    {
        $product = Product::find($id);



            return view('client.pages.detail');

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

    }





 public function addToCart($id)
 {
     $product = Product::find($id);

     if(!$product) {

         abort(404);

     }
     $cart = session()->get('cart');
     // if cart is empty then this the first product
     if(!$cart) {

         $cart = [
             $id => [
                 "name" => $product->name,
                 "quantity" => 1,
                 "price" => $product->price,
                 "photo" => $product->image
             ]
         ];

         session()->put('cart', $cart);

         return view('client.pages.detail');

         //return redirect()->back()->with('success', 'Product added to cart successfully!');
     }

     // if cart not empty then check if this product exist then increment quantity
     if(isset($cart[$id])) {

         $cart[$id]['quantity']++;

         session()->put('cart', $cart);

         return view('client.pages.cart', ['msg' => 'Product added to cart successfully!']);

         //return redirect()->back()->with('success', 'Product added to cart successfully!');

     }

     // if item not exist in cart then add to cart with quantity = 1
     $cart[$id] = [
         "name" => $product->name,
         "quantity" => 1,
         "price" => $product->price,
         "photo" => $product->image
     ];

     session()->put('cart', $cart);

     return view('cart', ['msg' => 'Product added to cart successfully!']);
    }
}
