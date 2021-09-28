<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminAccountController extends Controller
{
    public function getAllAdminAccount() {
        return DB::table('admin_account')->get();
    }
    public function adminAccountPage() {
        $adminAccounts = $this->getAllAdminAccount();
        return view('components.admin.adminAccount')->with(['admins'=>$adminAccounts]);
    }
    public function addAdminAccount() {
        $email = request()->Email;
        $password = request()->Password;
        $firstName = request()->FirstName;
        $middleName = request()->MiddleName;
        $lastName = request()->LastName;
        $telephone = request()->Telephone;
        $address = request()->Address;
        $birthday = request()->Birthday;
        $image = request()->file('image');
        $getFile = $image->getClientOriginalName();
        $file = public_path('admin/images/avatar_admin/' . $image->getClientOriginalName());
        if(file_exists($file)){
            $getFile= time().$getFile;
        }
        $flag = $image->move('admin/images/avatar_admin/', $getFile);
        if($flag){
            $localImage = 'admin/images/avatar_admin/'. $getFile;
            $check = DB::table('admin_account')
            ->insert(['Email'=>$email,'Password'=>$password,'FirstName'=>$firstName,'MiddleName'=>$middleName,'LastName'=>$lastName,
            'Image'=>$localImage,'Telephone'=>$telephone,'Address'=>$address,'Birthday'=>$birthday]);
            if($check) {
                return "Add admin account success!";
            }
        }
        return "Not success";
    }
    public function editAdminAccount() {
        $accountID = request()->AccountID;
        $email = request()->Email;
        $password = request()->Password;
        $firstName = request()->FirstName;
        $middleName = request()->MiddleName;
        $lastName = request()->LastName;
        $telephone = request()->Telephone;
        $address = request()->Address;
        $birthday = request()->Birthday;
        $image = request()->file('image');
        if($image) {
            $getFile = $image->getClientOriginalName();
            $file = public_path('admin/images/avatar_admin/' . $image->getClientOriginalName());
            if(file_exists($file)){
                $getFile= time().$getFile;
            }
            $flag = $image->move('admin/images/avatar_admin/', $getFile);
            if($flag){
                $localImage = 'admin/images/avatar_admin/'. $getFile;
                $check = DB::table('admin_account')->where('AccountID',$accountID)
                    ->update(['Email'=>$email,'Password'=>$password,'FirstName'=>$firstName,'MiddleName'=>$middleName,'LastName'=>$lastName,'Image'=>$localImage,'Telephone'=>$telephone,'Address'=>$address,'Birthday'=>$birthday]);
                if($check) {
                    return "Edit admin account success!";
                }
            }
        }
        else {
            $check = DB::table('admin_account')->where('AccountID',$accountID)
                ->update(['Email'=>$email,'Password'=>$password,'FirstName'=>$firstName,'MiddleName'=>$middleName,'LastName'=>$lastName,'Telephone'=>$telephone,'Address'=>$address,'Birthday'=>$birthday]);
            if($check) {
                return "Edit admin account success!";
            }
        }
        return "Not success";
    }
}
