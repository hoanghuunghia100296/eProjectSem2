<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function quantityOrdersProcessing() {
        return count( DB::table('tbl_order')->where('OrderStatus','=',1)->get());
    }
    public function quantityProductsSelling() {
        return count( DB::table('product')->where('Status','=',1)->get());
    }
    public function quantityUserRegistration() {
        return count( DB::table('customer')->get());
    }
    public function revenue() {
        $revenue = DB::select('select sum(TotalPrice) as revenue from tbl_order WHERE MONTH(OrderDate) = MONTH(CURRENT_DATE()) AND OrderStatus = 3')[0]->revenue;
        if($revenue == null) {
            $revenue = 0;
        } 
        return $revenue;
    }
    public function quantityProductSaledMonthly($month,$year) {
        $qty = DB::select('select SUM(od.Quantity) as sum from tbl_order as o,order_detail as od 
        WHERE MONTH(o.OrderDate) = '.$month.' AND YEAR(o.OrderDate) = '.$year.' AND od.OrderID = o.OrderID AND o.OrderStatus = 3')[0]->sum;
        return $qty;
    }
    public function homePage() {
        $qtyOrdersProcessing = $this->quantityOrdersProcessing();
        $qtyProductsSelling = $this->quantityProductsSelling();
        $qtyUserRegistration = $this->quantityUserRegistration();
        $revenue = $this->revenue();
        $array_qtyProductSaled = [];
        for($i=1;$i<=12;$i++) {
            $qtyProductSaled = $this->quantityProductSaledMonthly($i,2021);
            if($qtyProductSaled == null) {
                $qtyProductSaled = 0;
            }
            $array_qtyProductSaled[$i] = $qtyProductSaled;
        }
        return view('components.admin.dashboard')->with(['qtyOrdersProcessing'=>$qtyOrdersProcessing,
        'qtyProductsSelling'=>$qtyProductsSelling,'qtyUserRegistration'=>$qtyUserRegistration,'revenue'=>$revenue,'array_qtyProductSaled'=>$array_qtyProductSaled]);
    }
}
