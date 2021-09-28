<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SupportController;

class CinemaController extends Controller
{
    public function getAllProvince() {
        return DB::table('province')->get();
    }
    public function getCinemasByPage($skip) {
        $cinemas_show = DB::table('cinema as c')
        ->join('province as p','p.province_id','=','c.province_id')
        ->skip($skip)
        ->take(10)
        ->orderBy('c.cinema_id', 'asc')
        ->select('c.cinema_id','c.cinema_name','p.province_name','c.province_id')
        ->get();
        return $cinemas_show;
    }
    public function getCinemasByName($name) {
        $cinemas_show = DB::table('cinema as c')
        ->join('province as p','p.province_id','=','c.province_id')
        ->where('c.cinema_name','like','%'+$name+'%')
        ->orderBy('c.cinema_id', 'asc')
        ->select('c.cinema_id','c.cinema_name','p.province_name','c.province_id')
        ->get();
        return $cinemas_show;
    }
    public function getTotalCinema() {
        $cinemas = DB::table('cinema as c')->get();
        return $cinemas;
    }
    public function cinemaPage() {
        //total cinemas
        $total_cinemas = count($this->getTotalCinema());
        //total pages shows
        $total_pages =  (new SupportController)->totalPages($total_cinemas);
        // skip
        if(request()->page == null || request()->page == 1 ) {
            $skip = 0;
            $currentPage = 1;
        }
        else {
            $skip = (request()->page - 1) * 10; 
            $currentPage = request()->page;
        }
        $provinces = $this->getAllProvince();
        $cinemas_show = $this->getCinemasByPage($skip);
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('components.admin.cinema')
            ->with(['cinemas'=> $cinemas_show, 'provinces'=> $provinces, 'totalPages'=> $total_pages, 'currentPage'=>$currentPage]);
        }
    }
    public function addCinemaAPI() {
        $cinema_name = request()->name;
        $province_id = request()->pro;
        $check = DB::table('cinema')->insert(['cinema_name'=>$cinema_name,'province_id'=>$province_id]);
        if($check) {
            return 1;
        }
        else {
            return 0;
        }
    }
    public function editCinemaAPI() {
        $cinema_id = request()->id;
        $cinema_name = request()->name;
        $province_id = request()->pro;
        $check = DB::table('cinema')->where('cinema_id',$cinema_id)->update(['cinema_name'=>$cinema_name,'province_id'=>$province_id]);
        if($check) {
            return 1;
        }
        else {
            return 0;
        }
    }
    public function deleteCinemaAPI() {
        $cinema_id = request()->id;
        $check = DB::table('cinema')->where('cinema_id',$cinema_id)->delete();
        if($check) {
            return 1;
        }
        else {
            return 0;
        }
    }
}
