<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class GuestAccountController extends Controller
{
    public function accountPage() {
        $userID = session()->get('userID');
        $user = DB::table('customer')->where('CustomerID',$userID)->first();
        return view('components.guest.guestAccount')->with(['user'=>$user]);
    }
    public function editAccount(Request $request){
        $userID = $request->get('userID');
        $password = $request->get('password');
        $firstName = $request->get('firstName');
        $middleName = $request->get('middleName');
        $lastName = $request->get('lastName');
        $address = $request->get('address');
        $telephone = $request->get('telephone');
        $birthday = $request->get('birthday');
        $result = DB::table('customer') ->where('CustomerID', $userID)
                ->update(['Password' => $password,'FirstName' => $firstName,'MiddleName' => $middleName,'LastName' => $lastName,
                'Address' => $address,'Telephone' => $telephone,'Birthday' => $birthday]);
        return $result;
    }
}
