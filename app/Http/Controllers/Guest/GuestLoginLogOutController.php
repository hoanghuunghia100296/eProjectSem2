<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class GuestLoginLogoutController extends Controller
{
    public function loginPage(Request $request) {
        session()->forget('userID');
        session()->forget('userName');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('components.guest.login');
        } 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $request->input('txtemail');
            $password = $request->input('txtpassword');
            $user = DB::table('customer')->where('email',$email)->first();
            $message = "Account email is not exist!";
            if($user != null ) {
                if($user->Password == $password) {
                    $request->session()->put('userID',$user->CustomerID);
                    $request->session()->put('userName',$user->FirstName);
                    return redirect('/home');
                } else {
                    $message = "Your password is not correct!" ;
                }
            } 
            return view('components.guest.login')->with(['message'=>$message]);
        }
    }
    public function logoutPage(){
        session()->flush();
        return redirect('/home');
    }
    public function registerPage(Request $request) {
        session()->forget('userID');
        session()->forget('userName');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('components.guest.register');
        } 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $request->input('txtEmail');
            $password = $request->input('txtPassword');
            $firstName = $request->input('txtFirstname');
            $middleName = $request->input('txtMiddlename');
            $lastName = $request->input('txtLastname');
            $address = $request->input('txtAddress');
            $telephone = $request->input('txtTelephone');
            $birthday = $request->input('txtBirthday');
            $user = DB::table('customer')->where('email',$email)->first();
            if($user != null) {
                $message = "Email is exist. Please enter another email to register!";
                return view('components.guest.register')->with(['message'=>$message]);
            }
            $result = DB::table('customer')->insert([
                'Email' => $email,'Password' => $password,'FirstName' => $firstName,'MiddleName' => $middleName,'LastName' => $lastName,'Address' => $address,
                'Telephone' => $telephone,'Birthday' => $birthday
            ]);
            if($result) {
                $user = DB::table('customer')->where('email',$email)->first();
                $request->session()->put('userID',$user->CustomerID);
                $request->session()->put('userName',$user->FirstName);
                return redirect('/home');

            }
        }
    }
}
