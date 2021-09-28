<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function totalPages($total,$quantity_show) {
        if($total > $quantity_show) {
            $total_pages = (int)($total/$quantity_show) + ($total%$quantity_show != 0? 1 : 0);
        }else {
            $total_pages = 1;
        }
        return $total_pages;
    }
}
