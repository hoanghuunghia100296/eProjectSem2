<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LikeUnlikeProductController extends Controller
{
    public function getAllLikeProductByCustomer($userID) {
        return DB::table('customer_like_product')->where('CustomerID','=',$userID)->get();
    }
    public function likeUnlikeProduct() {
        $userID = session()->get('userID');
        $productID = request()->id;
        $searchLikedProductByID = DB::table('customer_like_product')->where('CustomerID','=',$userID)->where('ProductID','=',$productID)->get()->first();
        if($searchLikedProductByID != null) {
            if($searchLikedProductByID->Status == 1) {
                DB::table('customer_like_product')->where('id',$searchLikedProductByID->id)->update(['Status'=>2]);
            }else {
                DB::table('customer_like_product')->where('id',$searchLikedProductByID->id)->update(['Status'=>1]);
            }
        }else {
            DB::table('customer_like_product')->insert(['CustomerID'=>$userID,'ProductID'=>$productID,'Status'=>1]);
        }
    }
}
