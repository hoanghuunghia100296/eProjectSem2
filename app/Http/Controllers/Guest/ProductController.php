<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SupportController;


class ProductController extends Controller
{
    public function get4ProductNewArrival() {
        return DB::table('product as p')
        ->join('category as c','c.CategoryID','=','p.CategoryID')
        ->orderBy('p.ReleaseDate', 'desc')
        ->skip(0)
        ->take(4)
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
    }
    public function getProductByID($id) {
        return DB::table('product as p') ->join('category as c','c.CategoryID','=','p.CategoryID') 
        ->where('p.productID','=',$id)
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
    }
    public function getAllCategory() {
        return DB::table('category')->get();
    }
    public function getProductsByPage($skip,$take) {
        $products_show = DB::table('product as p')
        ->join('category as c','c.CategoryID','=','p.CategoryID')
        ->skip($skip)
        ->take($take)
        ->orderBy('p.ProductID', 'asc')
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
        return $products_show;
    }
    
    public function getProductsByNameCategoryPage($skip,$take,$cateID,$name) {
        if($name == null) {
            if($cateID==0) {
                $products_show = $this->getProductsByPage($skip,$take);
            }else {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->where('p.CategoryID','=',''.$cateID.'')
                ->skip($skip)
                ->take($take)
                ->orderBy('p.ProductID', 'asc')
                ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                ->get();
            }
        }else {
            if($cateID==0) {
                $products_show = $this->getProductsByNamePage($skip,$take,$name);
            }else {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->where('p.CategoryID','=',''.$cateID.'')
                ->where('p.ProductName','like','%'.$name.'%')
                ->skip($skip)
                ->take($take)
                ->orderBy('p.ProductID', 'asc')
                ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                ->get();
            }
        }
        
        return $products_show;
    }
    public function getTotalProductsByNameCategory($name,$cateID) {
        if($name == null) {
            if($cateID==0) {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->select()
                ->get();
            }else {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->where('p.CategoryID','=',''.$cateID.'')
                ->select()
                ->get();
            }
        }else {
            if($cateID==0) {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->where('p.ProductName','like','%'.$name.'%')
                ->select()
                ->get();
            }else {
                $products_show = DB::table('product as p')
                ->join('category as c','c.CategoryID','=','p.CategoryID')
                ->where('p.CategoryID','=',''.$cateID.'')
                ->where('p.ProductName','like','%'.$name.'%')
                ->select()
                ->get();
            }
        }
        return count($products_show);
    }
    
    public function getProductsByNameCateSortPage($skip,$take,$cateID,$sortID,$name) {
        if($name == null) {
            if($sortID == 0) {
                if($cateID==0) {
                    $products_show = $this->getProductsByPage($skip,$take);
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ProductID', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 1) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ReleaseDate', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ReleaseDate', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 2) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 3) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
        }else {
            if($sortID == 0) {
                if($cateID==0) {
                    $products_show = $this->getProductsByNamePage($skip,$take,$name);
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ProductID', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 1) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ReleaseDate', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.ReleaseDate', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 2) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'asc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
            elseif($sortID == 3) {
                if($cateID==0) {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }else {
                    $products_show = DB::table('product as p')
                    ->join('category as c','c.CategoryID','=','p.CategoryID')
                    ->where('p.CategoryID','=',''.$cateID.'')
                    ->where('p.ProductName','like','%'.$name.'%')
                    ->skip($skip)
                    ->take($take)
                    ->orderBy('p.price', 'desc')
                    ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
                    ->get();
                }
            }
        }
        return $products_show;
    }
    
    public function getProductsByNamePage($skip,$take,$name) {
        $products_show = DB::table('product as p')
        ->join('category as c','c.CategoryID','=','p.CategoryID')
        ->where('p.ProductName','like','%'.$name.'%')
        ->skip($skip)
        ->take($take)
        ->orderBy('p.ProductID', 'asc')
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
        return $products_show;
    }
    public function getTotalProduct() {
        $products = DB::table('product as p')->get();
        return $products;
    }
    public function productPage() {
        // take
        $take = 9;
        $name = request()->name;
        if(request()->cate == null){
            $cateID = 0;
        }else {
            $cateID = request()->cate;
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
        $categories = $this->getAllCategory();
        $products_show = $this->getProductsByNameCategoryPage($skip,$take,$cateID,$name);
        if(request()->sort != null) {
            $sortID = request()->sort;
            $products_show = $this->getProductsByNameCateSortPage($skip,$take,$cateID,$sortID,$name);
        }
        else {
            $sortID = 0;
        }
        //total products
        $total_products = $this->getTotalProductsByNameCategory($name,$cateID);
        //total pages shows
        $total_pages =  (new SupportController)->totalPages($total_products,$take);
        $startProduct = $skip+1;
        $endProduct = $skip + $take > $total_products ? $total_products : $skip+$take;
        if(session()->get('userID')) {
            $likeProducts = (new LikeUnlikeProductController)->getAllLikeProductByCustomer(session()->get('userID'));
        }else {
            $likeProducts = 0;
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('components.guest.product')
            ->with(['products'=> $products_show, 'categories'=> $categories, 'totalPages'=> $total_pages, 'currentPage'=>$currentPage, 
            'totalProducts'=>$total_products,'startProduct'=>$startProduct,'endProduct'=>$endProduct,'sort'=>1,'category'=>$cateID,
            'sortID'=>$sortID,'seachName'=>$name,'likeProducts'=>$likeProducts
            ]);
        }
    }
    public function productDetails() {
        $productID = request()->id;
        $product = $this->getProductByID($productID)[0];
        return view('components.guest.productDetails')->with(['product'=>$product]);
    }
}
