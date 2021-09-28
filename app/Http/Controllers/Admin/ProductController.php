<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function getProductByID($id) {
        return DB::table('product as p') ->join('category as c','c.CategoryID','=','p.CategoryID') 
        ->where('p.productID','=',$id)
        ->select('p.ProductID','p.CategoryID','p.ProductName','p.Price','p.ReleaseDate','p.Image','p.Status','p.Information','c.CategoryName')
        ->get();
    }
    public function getAllCategory() {
        return DB::table('category')->get();
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
    public function productPage() {
        // take
        $take = 9;
        $name = request()->name;
        // skip for pagination
        if(request()->page == null || request()->page == 1 ) {
            $skip = 0;
            $currentPage = 1;
        }
        else {
            $skip = (request()->page - 1) * $take; 
            $currentPage = request()->page;
        }
        //total products
        $total_products = $this->getTotalProductsByNameCategory($name,$cateID=0);
        //total pages shows
        $total_pages =  (new SupportController)->totalPages($total_products,$take);
        $categories = $this->getAllCategory();
        $products_show = $this->getProductsByNamePage($skip,$take,$name);
        return view('components.admin.product')
            ->with(['products'=> $products_show, 'categories'=> $categories, 'totalPages'=> $total_pages, 'currentPage'=>$currentPage, 
            'totalProducts'=>$total_products,'searchName'=>$name
        ]);
    }
    public function addProduct(Request $request) {
        $productName = request()->productName;
        $releaseDate = request()->releaseDate;
        $price = request()->price;
        $status = request()->status;
        $category = request()->category;
        $information = request()->information;
        $image = $request->file('image');
        $getFile = $image->getClientOriginalName();
        $file = public_path('guest/img/bg-img/' . $image->getClientOriginalName());
        if(file_exists($file)){
            $getFile= time().$getFile;
        }
        $flag = $image->move('guest/img/bg-img', $getFile);
        if($flag){
            $localImage = 'guest/img/bg-img/'. $getFile;
            $check = DB::table('product')->insert(['ProductName'=>$productName,'CategoryID'=>$category,'ReleaseDate'=>$releaseDate,'Price'=>$price,'Status'=>$status,'Image'=>$localImage,'Information'=>$information]);
            if($check) {
                return "Add new product success!";
            }
        }
        return "Not success";
    }
    public function editProduct(Request $request) {
        $productID = request()->productID;
        $productName = request()->productName;
        $releaseDate = request()->releaseDate;
        $price = request()->price;
        $status = request()->status;
        $category = request()->category;
        $information = request()->information;
        $image = $request->file('image');
        if($image) {
            $getFile = $image->getClientOriginalName();
            $file = public_path('guest/img/bg-img/' . $image->getClientOriginalName());
            if(file_exists($file)){
                $getFile= time().$getFile;
            }
            $flag = $image->move('guest/img/bg-img', $getFile);
            if($flag){
                $localImage = 'guest/img/bg-img/'. $getFile;
                $check = DB::table('product')->where('ProductID',$productID) 
                ->update(['ProductName'=>$productName,'CategoryID'=>$category,'ReleaseDate'=>$releaseDate,'Price'=>$price,'Status'=>$status,'Image'=>$localImage,'Information'=>$information]);
                if($check) {
                    return "Edit product success!";
                }
            }
        }else {
            $check = DB::table('product')->where('ProductID',$productID) 
            ->update(['ProductName'=>$productName,'CategoryID'=>$category,'ReleaseDate'=>$releaseDate,'Price'=>$price,'Status'=>$status,'Information'=>$information]);
            if($check) {
                return "Edit product success!";
            }
        }
        return "Not success";
    }
    public function deactiveProduct() {
        $productID = request()->productID;
        $check = DB::table('product')->where('ProductID',$productID) ->update(['Status'=>2]);
        if($check) {
            return "Edit product success!";
        }
        return "Not success";

    }
    public function activeProduct() {
        $productID = request()->productID;
        $check = DB::table('product')->where('ProductID',$productID) ->update(['Status'=>1]);
        if($check) {
            return "Edit product success!";
        }
        return "Not success";
    }
}
