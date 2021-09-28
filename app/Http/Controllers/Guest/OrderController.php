<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function getOrderByID($id){
        DB::table('tbl_order')->where('OrderID','=',$id)->get();
    }
    public function addOrder($customerID,$deliveryAddress,$totalPrice,$telephone,$description) {
        $orderStatus = 1;
        $check = DB::table('tbl_order')->insert(['CustomerID'=>$customerID,'DeliveryAddress'=>$deliveryAddress,'Telephone'=>$telephone,
        'Description'=>$description,'OrderStatus'=>$orderStatus,'TotalPrice'=>$totalPrice]);
        return $check;
    }
    public function getAllOrderByUser($userID){
        return DB::table('tbl_order')->where('CustomerID','=',$userID)
        ->orderBy('OrderDate', 'desc')
        ->get();
    }
    public function getProductsByOrderID($orderID) {
        return DB::table('order_detail')->where('OrderID','=',$orderID)->get();
    }
    public function getProductByID($id) {
        return DB::table('product')->where('ProductID','=',$id)->get();
    }
    public function orderHistory() {
        $userID = session()->get('userID');
        $order_show = $this->getAllOrderByUser($userID);
        $ArrayProducts = [];
        foreach($order_show as $o) {
            $product_array = [];
            $productsByOrderID = $this->getProductsByOrderID($o->OrderID);
            foreach($productsByOrderID as $p) {
                $product = $this->getProductByID($p->ProductID)[0];
                $product->Quantity = $p->Quantity;
                $product_array[$p->ProductID] = $product;
            }
            $ArrayProducts[$o->OrderID] = $product_array;
        }
        // dd($ArrayProducts);
        return view('components.guest.orders')->with(['orders'=>$order_show,'products'=>$ArrayProducts]);
    }
}
