<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function getOrderByID($id) {
        $order = DB::table('tbl_order as o')
        ->join('customer as c','c.CustomerID','=','o.CustomerID')
        ->join('status_order as so','so.StatusID','=','o.OrderStatus')
        ->where('o.OrderID','=',$id)
        ->select('o.OrderID','o.OrderDate','c.Email','o.OrderStatus','so.StatusName','o.TotalPrice','o.DeliveryAddress','o.Telephone',
        'o.Description','o.DeliveryAddressAfterConfirm','o.TelephoneAfterConfirm','o.DescriptionAfterConfirm','o.FullNameAfterConfirm','o.DeliveryDate')
        ->get();
        return $order;
    }
    public function getOrdersDetailsByOrderID($orderID) {
        $ordersDetails = DB::table('order_detail as od')
        ->join('tbl_order as o','o.OrderID','=','od.OrderID')
        ->where('o.OrderID','=',$orderID)
        ->get();
        return $ordersDetails;
    }
    public function getProductByProductID($productID) {
        return DB::table('product as p') ->join('category as c','c.CategoryID','=','p.CategoryID') 
        ->where('p.productID','=',$productID)
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
    }
    public function getOrdersByPage($skip,$take) {
        $orders_show = DB::table('tbl_order as o')
        ->join('customer as c','c.CustomerID','=','o.CustomerID')
        ->join('status_order as so','so.StatusID','=','o.OrderStatus')
        ->skip($skip)
        ->take($take)
        ->orderBy('o.OrderDate', 'desc')
        ->select('o.OrderID','o.OrderDate','c.Email','o.OrderStatus','so.StatusName','o.TotalPrice')
        ->get();
        return $orders_show;
    }
    public function getOrdersByStatusPage($skip,$take,$status){
        if($status==0) {
            $orders_show = $this->getOrdersByPage($skip,$take);
        }else {
            $orders_show = DB::table('tbl_order as o')
            ->join('customer as c','c.CustomerID','=','o.CustomerID')
            ->join('status_order as so','so.StatusID','=','o.OrderStatus')
            ->where('o.OrderStatus','=',''.$status.'')
            ->skip($skip)
            ->take($take)
            ->orderBy('o.OrderDate', 'desc')
            ->select('o.OrderID','o.OrderDate','c.Email','o.OrderStatus','so.StatusName','o.TotalPrice')
            ->get();
        }
        return $orders_show;
    }
    public function getTotalOrdersByStatus($status) {
        if($status==0) {
            $orders = DB::table('tbl_order as o')->get();
        }else {
             $orders= DB::table('tbl_order as o')
            ->where('o.OrderStatus','=',''.$status.'')
            ->get();
        }
        return count($orders);
    }
    public function orderPage() {
        $take = 9;
        if(request()->status == null){
            $status = 0;
        }else {
            $status = request()->status;
        }
        // skip for pagination
        if(request()->page == null || request()->page == 1 ) {
            $skip = 0;
            $currentPage = 1;
        }
        else {
            $skip = (request()->page - 1) * $take; 
            $currentPage = request()->page;
        }
        $orders_show = $this->getOrdersByStatusPage($skip,$take,$status);
        $total_orders = $this->getTotalOrdersByStatus($status);
        $total_pages = (new SupportController)->totalPages($total_orders,$take);
        $startOrder = $skip+1;
        $endOrder = $skip + $take > $total_orders ? $total_orders : $skip+$take;
        switch($status) {
            case 0: 
                $statusName = "All";
                break;
            case 1:
                $statusName = "Processing";
                break;
            case 2:
                $statusName = "Delivery";
                break;
            case 3:
                $statusName = "Done";
                break;
            default:
                $statusName = "Cancel";
        }
        return view('components.admin.order')->with(['orders'=> $orders_show, 'totalPages'=> $total_pages, 'currentPage'=>$currentPage, 
        'totalOrders'=>$total_orders,'startOrder'=>$startOrder,'endOrder'=>$endOrder,'statusName'=>$statusName
        ]);
    }
    public function orderDetailPage() {
        $orderID = request()->id;
        $orderByID = $this->getOrderByID($orderID);
        $ordersDetailsByOrderID = $this->getOrdersDetailsByOrderID($orderID);
        $ArrayProducts = [];
        foreach($ordersDetailsByOrderID as $p) {
            $product = $this->getProductByProductID($p->ProductID)[0];
            $product->Quantity = $p->Quantity;
            $ArrayProducts[$p->ProductID] = $product;
        }
        $status = $orderByID[0]->OrderStatus;
        return view('components.admin.orderDetail')->with(['products'=>$ArrayProducts,'ordersDetails'=>$ordersDetailsByOrderID,'statusOrder'=>$status,'order'=>$orderByID[0]]);
    }
    public function updateDeliveryOrderStatus() {
        $orderID = request()->OrderID;
        $fullname = request()->FullName;
        $telephone = request()->Telephone;
        $address = request()->Address;
        $description = request()->Description;
        $check = DB::table('tbl_order')->where('OrderID',$orderID)
        ->update(['OrderStatus'=>2,'TelephoneAfterConfirm'=>$telephone,'DeliveryAddressAfterConfirm'=>$address,'FullNameAfterConfirm'=>$fullname,'DescriptionAfterConfirm'=>$description]);
        if($check) {
            return "Update status order success.";
        }
        return "Not success";
        
    }
    public function updateDoneOrderStatus() {
        $orderID = request()->OrderID;
        $deliveryDate = request()->DeliveryDate;
        $check = DB::table('tbl_order')->where('OrderID',$orderID)
        ->update(['OrderStatus'=>3,'DeliveryDate'=>$deliveryDate]);
        if($check) {
            return "Update status order success.";
        }
        return "Not success";
    }
    public function updateCancelOrderStatus() {
        $orderID = request()->OrderID;
        $check = DB::table('tbl_order')->where('OrderID',$orderID)
        ->update(['OrderStatus'=>4]);
        if($check) {
            return "Update status order success.";
        }
        return "Not success";
    }
}
