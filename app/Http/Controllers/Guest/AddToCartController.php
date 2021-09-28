<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
session_start();
class AddToCartController extends Controller
{
    public function addToCart(Request $request) {
        $product_id = $request->get('ProductID');
        $product = (new ProductController)->getProductByID($product_id);
        if($request->get('Quantity')) {
            $quantity = $request->get('Quantity');
        }else {
            $quantity = 1;
        }
        $item = [
            'product_id' => $product[0]->ProductID,
            'product_name'=>$product[0]->ProductName,
            'price'=>$product[0]->Price,
            'image'=>$product[0]->Image,
            'quantity'=> 1
            
        ];
        
        $cart = [];
        if(isset(session()->get('cart')[$product_id])){
            $cart = session()->get('cart');
            $cart[$product_id]['quantity'] +=$quantity;
            session()->put('cart',$cart);
        }
        else {
            $cart = session()->get('cart');
            $cart[$product_id] = $item;
            session()->put('cart',$cart);
        }
        return count(session()->get('cart'));
    } 
}
