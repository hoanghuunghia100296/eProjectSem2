<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function Admin_logoutPage() {
        session()->flush();
        return redirect('/admin/login');
    }

    public function Admin_LoginPage(Request $request){
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            return view('layouts.admin.login');

        }
        else {
            return $this->checkLogin($request);
        }
    }
    public function checkLogin($request) {
        $email = $request -> input('txtemail');
        $pwd = $request -> input('txtpassword');
        $user = DB::table('admin')->where('admin_email',$email)->first();
        if($user !=null && $user->admin_password == $pwd) { 
            if($user->admin_active==1){
                session() -> put('admin',$user->admin_email);
                session() -> put('role',$user->admin_role);

                return redirect('/admin/index');
            }else {
                $message = 'This admin account is blocked. Please contact SUPER ADMIN!';
                return view('layouts.admin.login')->with(['message'=> $message]);
            }
        }
        $message = 'Email or Password is wrong.Please Re-Enter!';
        return view('layouts.admin.login')->with(['message'=> $message]);
    }
}
