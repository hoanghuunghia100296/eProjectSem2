<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage() {
        $productNewArrival = (new ProductController)->get4ProductNewArrival();
        if(session()->get('userID')) {
            $likeProducts = (new LikeUnlikeProductController)->getAllLikeProductByCustomer(session()->get('userID'));
        }else {
            $likeProducts = 0;
        }
        return view('components.guest.home')->with(['productNewArrival'=>$productNewArrival,'likeProducts'=>$likeProducts]);
    }
}
