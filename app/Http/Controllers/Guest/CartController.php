<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function updateCartQuantity() {
        $product_id = request()->product_id;
        $quantity_update = request()->quantity;

        $cart = session()->get('cart');
        $cart[$product_id]['quantity'] = $quantity_update;
        session()->put('cart',$cart);
        return redirect("./cart");

    }
    public function deleteACart() {
        $product_id = request()->product_id;
        
        $cart = session()->get('cart');
        unset($cart[$product_id]);
        session()->put('cart',$cart);
        return redirect("./cart");

    }
    public function deleteAllCart() {
        $cart = [];
        session()->put('cart',$cart);
        return redirect("./cart");
    }
    public function orderCart() {
        $userID = session()->get('userID');
        $cart = session()->get('cart');
        $totalMoney = request()->totalMoney;
        $deliAddress = request()->deliAddress;
        $telephone = request()->telephone;
        $description = request()->description;
        $message='Not success!';
        $check = (new OrderController)->addOrder($userID,$deliAddress,$totalMoney,$telephone,$description);
        if($check) {
            $Last_created_order =
                DB::select('SELECT * FROM tbl_order WHERE OrderID = (SELECT MAX(OrderID) FROM tbl_order)');
            foreach($cart as $p_id => $value){
                $price = (new ProductController)->getProductByID($p_id)[0]->Price;
                $money = $value['quantity'] * $price;
                DB::table('order_detail')->insert(['OrderID'=>$Last_created_order[0]->OrderID,'ProductID'=>$p_id,'Quantity'=>$value['quantity'],'Money'=>$money]);
            }
            $message = 'Your order is sent to admin. We will contact to you soon!';
            $cart = [];
            session()->put('cart',$cart);
        }
        return $message;
    }
}
