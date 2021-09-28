<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminLoginLogoutController extends Controller
{
    public function loginPage(Request $request) {
        // session()->forget('userID');
        // session()->forget('userName');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('layouts.admin.login');
        } 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $request->input('txtemail');
            $password = $request->input('txtpassword');
            $user = DB::table('admin_account')->where('email',$email)->first();
            $message = "Account email is not exist!";
            if($user != null ) {
                if($user->Password == $password) {
                    $request->session()->put('adminID',$user->AccountID);
                    $request->session()->put('adminName',$user->FirstName);
                    $request->session()->put('adminImage',$user->Image);
                    return redirect('admin/home');
                } else {
                    $message = "Your password is not correct!" ;
                }
            } 
            return view('layouts.admin.login')->with(['message'=>$message]);
        }
    }
    public function logoutPage(){
        session()->flush();
        return redirect('/admin/login');
    }
}
